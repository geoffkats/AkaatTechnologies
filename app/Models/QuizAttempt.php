<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'status',
        'started_at',
        'completed_at',
        'score',
        'percentage',
        'passed',
        'time_taken',
        'questions_data',
        'answers',
        'results',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'score' => 'integer',
        'percentage' => 'decimal:2',
        'passed' => 'boolean',
        'time_taken' => 'integer',
        'questions_data' => 'array',
        'answers' => 'array',
        'results' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    // Scopes
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePassed($query)
    {
        return $query->where('passed', true);
    }

    public function scopeFailed($query)
    {
        return $query->where('passed', false);
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }

    // Accessors
    public function getFormattedTimeAttribute(): string
    {
        if (!$this->time_taken) {
            return '0 seconds';
        }
        
        $minutes = floor($this->time_taken / 60);
        $seconds = $this->time_taken % 60;
        
        if ($minutes > 0) {
            return $seconds > 0 ? "{$minutes}m {$seconds}s" : "{$minutes} minutes";
        }
        
        return "{$seconds} seconds";
    }

    public function getStatusBadgeColorAttribute(): string
    {
        return match ($this->status) {
            'completed' => $this->passed ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800',
            'in_progress' => 'bg-blue-100 text-blue-800',
            'abandoned' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'completed' => $this->passed ? 'Passed' : 'Failed',
            'in_progress' => 'In Progress',
            'abandoned' => 'Abandoned',
            default => 'Unknown',
        };
    }

    public function getGradeAttribute(): string
    {
        if (!$this->completed_at || $this->percentage === null) {
            return 'N/A';
        }
        
        return match (true) {
            $this->percentage >= 90 => 'A',
            $this->percentage >= 80 => 'B',
            $this->percentage >= 70 => 'C',
            $this->percentage >= 60 => 'D',
            default => 'F',
        };
    }

    // Helper methods
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isInProgress(): bool
    {
        return $this->status === 'in_progress';
    }

    public function hasPassed(): bool
    {
        return $this->passed === true;
    }

    public function abandon(): void
    {
        $this->update([
            'status' => 'abandoned',
            'completed_at' => now(),
        ]);
    }

    public function calculateTimeTaken(): void
    {
        if ($this->started_at && $this->completed_at) {
            $this->update([
                'time_taken' => $this->started_at->diffInSeconds($this->completed_at),
            ]);
        }
    }
}
