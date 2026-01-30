<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'status',
        'enrolled_at',
        'started_at',
        'completed_at',
        'progress_percentage',
        'last_accessed_at',
        'certificate_url',
        'payment_status',
        'payment_method',
        'amount_paid',
        'notes',
    ];

    protected $casts = [
        'enrolled_at' => 'datetime',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'last_accessed_at' => 'datetime',
        'progress_percentage' => 'decimal:2',
        'amount_paid' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function lessonCompletions(): HasMany
    {
        return $this->hasMany(LessonCompletion::class, 'user_id', 'user_id')
            ->whereHas('lesson', function ($query) {
                $query->where('course_id', $this->course_id);
            });
    }

    public function quizAttempts(): HasMany
    {
        return $this->hasMany(QuizAttempt::class, 'user_id', 'user_id')
            ->whereHas('quiz', function ($query) {
                $query->where('course_id', $this->course_id);
            });
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'active')->where('progress_percentage', '>', 0);
    }

    public function scopeNotStarted($query)
    {
        return $query->where('status', 'active')->where('progress_percentage', 0);
    }

    // Accessors
    public function getFormattedAmountPaidAttribute(): string
    {
        return 'UGX ' . number_format($this->amount_paid);
    }

    public function getStatusBadgeColorAttribute(): string
    {
        return match ($this->status) {
            'active' => 'bg-blue-100 text-blue-800',
            'completed' => 'bg-green-100 text-green-800',
            'suspended' => 'bg-red-100 text-red-800',
            'expired' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'active' => 'Active',
            'completed' => 'Completed',
            'suspended' => 'Suspended',
            'expired' => 'Expired',
            default => 'Unknown',
        };
    }

    public function getTimeSpentAttribute(): string
    {
        if (!$this->started_at) {
            return '0 hours';
        }
        
        $endTime = $this->completed_at ?? now();
        $hours = $this->started_at->diffInHours($endTime);
        
        if ($hours < 1) {
            $minutes = $this->started_at->diffInMinutes($endTime);
            return "{$minutes} minutes";
        }
        
        return "{$hours} hours";
    }

    // Helper methods
    public function updateProgress(): void
    {
        $totalLessons = $this->course->publishedLessons()->count();
        
        if ($totalLessons === 0) {
            $this->update(['progress_percentage' => 0]);
            return;
        }
        
        $completedLessons = $this->lessonCompletions()->count();
        $progressPercentage = ($completedLessons / $totalLessons) * 100;
        
        $this->update([
            'progress_percentage' => round($progressPercentage, 2),
            'last_accessed_at' => now(),
        ]);
        
        // Check if course is completed
        if ($progressPercentage >= 100 && $this->status === 'active') {
            $this->markAsCompleted();
        }
    }

    public function markAsCompleted(): void
    {
        $this->update([
            'status' => 'completed',
            'completed_at' => now(),
            'progress_percentage' => 100,
        ]);
        
        // Generate certificate
        $this->generateCertificate();
        
        // Award course completion badges
        $this->awardCompletionBadges();
    }

    public function markAsStarted(): void
    {
        if (!$this->started_at) {
            $this->update([
                'started_at' => now(),
                'last_accessed_at' => now(),
            ]);
        }
    }

    public function generateCertificate(): void
    {
        // This would generate a PDF certificate
        // For now, we'll just create a placeholder URL
        $certificateUrl = "/certificates/{$this->id}/certificate.pdf";
        
        $this->update([
            'certificate_url' => $certificateUrl,
        ]);
    }

    public function awardCompletionBadges(): void
    {
        // Award course-specific badges
        foreach ($this->course->badges as $badge) {
            $this->user->awardBadge($badge);
        }
        
        // Award general completion badges based on number of completed courses
        $completedCourses = $this->user->enrollments()->completed()->count();
        
        $milestones = [
            1 => 'First Course Completed',
            5 => 'Learning Enthusiast',
            10 => 'Knowledge Seeker',
            25 => 'Learning Master',
            50 => 'Education Champion',
        ];
        
        foreach ($milestones as $count => $badgeName) {
            if ($completedCourses >= $count) {
                $badge = Badge::where('name', $badgeName)->first();
                if ($badge) {
                    $this->user->awardBadge($badge);
                }
            }
        }
    }

    public function getNextLesson(): ?Lesson
    {
        $completedLessonIds = $this->lessonCompletions()->pluck('lesson_id')->toArray();
        
        return $this->course->publishedLessons()
            ->whereNotIn('id', $completedLessonIds)
            ->orderBy('sort_order')
            ->first();
    }

    public function getCurrentLesson(): ?Lesson
    {
        return $this->getNextLesson() ?? $this->course->publishedLessons()->orderBy('sort_order')->first();
    }

    public function canAccessLesson(Lesson $lesson): bool
    {
        if ($lesson->is_preview) {
            return true;
        }
        
        return $this->status === 'active' && $lesson->course_id === $this->course_id;
    }
}
