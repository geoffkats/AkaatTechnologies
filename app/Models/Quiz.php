<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'lesson_id',
        'title',
        'description',
        'questions',
        'time_limit_minutes',
        'max_attempts',
        'passing_score',
        'randomize_questions',
        'show_results_immediately',
        'is_published',
        'sort_order',
        'meta_data',
    ];

    protected $casts = [
        'questions' => 'array',
        'time_limit_minutes' => 'integer',
        'max_attempts' => 'integer',
        'passing_score' => 'decimal:2',
        'randomize_questions' => 'boolean',
        'show_results_immediately' => 'boolean',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
        'meta_data' => 'array',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function attempts(): HasMany
    {
        return $this->hasMany(QuizAttempt::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    // Accessors
    public function getFormattedTimeLimitAttribute(): string
    {
        if (!$this->time_limit_minutes) {
            return 'No time limit';
        }
        
        if ($this->time_limit_minutes >= 60) {
            $hours = floor($this->time_limit_minutes / 60);
            $minutes = $this->time_limit_minutes % 60;
            return $minutes > 0 ? "{$hours}h {$minutes}m" : "{$hours} hours";
        }
        
        return "{$this->time_limit_minutes} minutes";
    }

    public function getTimeLimitAttribute(): int
    {
        return ($this->time_limit_minutes ?? 0) * 60; // Convert to seconds for backward compatibility
    }

    public function getInstructionsAttribute(): string
    {
        return $this->meta_data['instructions'] ?? 'Answer all questions to complete this quiz.';
    }

    public function getTotalQuestionsAttribute(): int
    {
        return count($this->questions ?? []);
    }

    public function getMaxScoreAttribute(): int
    {
        return $this->total_questions;
    }

    // Helper methods
    public function canBeAttemptedBy(User $user): bool
    {
        if (!$this->is_published) {
            return false;
        }
        
        // Check if user is enrolled in the course
        if (!$this->course->canBeAccessedBy($user)) {
            return false;
        }
        
        // Check if user has reached max attempts
        if ($this->max_attempts > 0) {
            $attemptCount = $this->attempts()->where('user_id', $user->id)->count();
            if ($attemptCount >= $this->max_attempts) {
                return false;
            }
        }
        
        return true;
    }

    public function getAttemptsCountFor(User $user): int
    {
        return $this->attempts()->where('user_id', $user->id)->count();
    }

    public function getBestScoreFor(User $user): ?int
    {
        $bestAttempt = $this->attempts()
            ->where('user_id', $user->id)
            ->where('status', 'completed')
            ->orderBy('score', 'desc')
            ->first();
        
        return $bestAttempt?->score;
    }

    public function getLatestAttemptFor(User $user): ?QuizAttempt
    {
        return $this->attempts()
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function hasPassedFor(User $user): bool
    {
        $bestScore = $this->getBestScoreFor($user);
        return $bestScore !== null && $bestScore >= $this->passing_score;
    }

    public function createAttemptFor(User $user): QuizAttempt
    {
        return $this->attempts()->create([
            'user_id' => $user->id,
            'status' => 'in_progress',
            'started_at' => now(),
            'questions_data' => $this->shuffleQuestions(),
        ]);
    }

    protected function shuffleQuestions(): array
    {
        $questions = $this->questions ?? [];
        
        // Shuffle questions and their options
        $shuffledQuestions = collect($questions)->shuffle()->map(function ($question, $index) {
            $shuffledQuestion = $question;
            $shuffledQuestion['id'] = $index + 1;
            
            // Shuffle multiple choice options if present
            if (isset($question['options']) && is_array($question['options'])) {
                $shuffledQuestion['options'] = collect($question['options'])->shuffle()->values()->toArray();
            }
            
            return $shuffledQuestion;
        })->values()->toArray();
        
        return $shuffledQuestions;
    }

    public function gradeAttempt(QuizAttempt $attempt, array $answers): array
    {
        $questions = $attempt->questions_data;
        $score = 0;
        $results = [];
        
        foreach ($questions as $index => $question) {
            $questionId = $question['id'];
            $userAnswer = $answers[$questionId] ?? null;
            $correctAnswer = $question['correct_answer'] ?? null;
            
            $isCorrect = $this->checkAnswer($question, $userAnswer, $correctAnswer);
            
            if ($isCorrect) {
                $score++;
            }
            
            $results[] = [
                'question_id' => $questionId,
                'question' => $question['question'],
                'user_answer' => $userAnswer,
                'correct_answer' => $correctAnswer,
                'is_correct' => $isCorrect,
                'explanation' => $question['explanation'] ?? null,
            ];
        }
        
        $percentage = $this->total_questions > 0 ? round(($score / $this->total_questions) * 100, 2) : 0;
        $passed = $score >= $this->passing_score;
        
        // Update attempt
        $attempt->update([
            'status' => 'completed',
            'completed_at' => now(),
            'score' => $score,
            'percentage' => $percentage,
            'passed' => $passed,
            'answers' => $answers,
            'results' => $results,
        ]);
        
        return [
            'score' => $score,
            'total' => $this->total_questions,
            'percentage' => $percentage,
            'passed' => $passed,
            'results' => $results,
        ];
    }

    protected function checkAnswer($question, $userAnswer, $correctAnswer): bool
    {
        $type = $question['type'] ?? 'multiple_choice';
        
        switch ($type) {
            case 'multiple_choice':
            case 'true_false':
                return $userAnswer === $correctAnswer;
                
            case 'multiple_select':
                if (!is_array($userAnswer) || !is_array($correctAnswer)) {
                    return false;
                }
                sort($userAnswer);
                sort($correctAnswer);
                return $userAnswer === $correctAnswer;
                
            case 'text':
            case 'short_answer':
                return strtolower(trim($userAnswer)) === strtolower(trim($correctAnswer));
                
            default:
                return false;
        }
    }
}
