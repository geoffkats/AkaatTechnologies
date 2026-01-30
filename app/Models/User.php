<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'status',
        'preferences',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
            'preferences' => 'array',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    /**
     * Check if user has admin role
     */
    public function isAdmin(): bool
    {
        return in_array($this->role, [UserRole::Admin, UserRole::Manager]);
    }

    /**
     * Check if user has specific role
     */
    public function hasRole(UserRole $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Get the orders for the user
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the addresses for the user
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Get the reviews for the user
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the wishlist items for the user
     */
    public function wishlist(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    // E-Learning Relationships

    /**
     * Get the course enrollments for the user
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Get the active course enrollments for the user
     */
    public function activeEnrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class)->where('status', 'active');
    }

    /**
     * Get the completed course enrollments for the user
     */
    public function completedEnrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class)->where('status', 'completed');
    }

    /**
     * Get the lesson completions for the user
     */
    public function lessonCompletions(): HasMany
    {
        return $this->hasMany(LessonCompletion::class);
    }

    /**
     * Get the quiz attempts for the user
     */
    public function quizAttempts(): HasMany
    {
        return $this->hasMany(QuizAttempt::class);
    }

    /**
     * Get the badges earned by the user
     */
    public function badges(): BelongsToMany
    {
        return $this->belongsToMany(Badge::class, 'user_badges')
            ->withPivot(['earned_at', 'points_awarded'])
            ->withTimestamps();
    }

    /**
     * Get the user badge records
     */
    public function userBadges(): HasMany
    {
        return $this->hasMany(UserBadge::class);
    }

    // E-Learning Helper Methods

    /**
     * Check if user is enrolled in a specific course
     */
    public function isEnrolledIn(Course $course): bool
    {
        return $this->enrollments()->where('course_id', $course->id)->exists();
    }

    /**
     * Get enrollment for a specific course
     */
    public function getEnrollmentFor(Course $course): ?Enrollment
    {
        return $this->enrollments()->where('course_id', $course->id)->first();
    }

    /**
     * Award a badge to the user
     */
    public function awardBadge(Badge $badge): bool
    {
        if ($this->badges()->where('badge_id', $badge->id)->exists()) {
            return false; // Badge already awarded
        }

        $this->badges()->attach($badge->id, [
            'earned_at' => now(),
            'points_awarded' => $badge->points,
        ]);

        return true;
    }

    /**
     * Get total points earned from badges
     */
    public function getTotalPointsAttribute(): int
    {
        return $this->userBadges()->sum('points_awarded') ?? 0;
    }

    /**
     * Get learning statistics
     */
    public function getLearningStatsAttribute(): array
    {
        return [
            'total_courses' => $this->enrollments()->count(),
            'active_courses' => $this->activeEnrollments()->count(),
            'completed_courses' => $this->completedEnrollments()->count(),
            'total_badges' => $this->badges()->count(),
            'total_points' => $this->total_points,
            'lessons_completed' => $this->lessonCompletions()->count(),
            'quizzes_passed' => $this->quizAttempts()->where('passed', true)->distinct('quiz_id')->count(),
            'average_quiz_score' => $this->quizAttempts()->where('status', 'completed')->avg('percentage') ?? 0,
        ];
    }

    /**
     * Get current learning streak (placeholder)
     */
    public function getLearningStreakAttribute(): int
    {
        // This would calculate consecutive days of learning activity
        // For now, return a placeholder value
        return 5;
    }

    /**
     * Check if user has completed a specific lesson
     */
    public function hasCompletedLesson(Lesson $lesson): bool
    {
        return $this->lessonCompletions()->where('lesson_id', $lesson->id)->exists();
    }

    /**
     * Mark a lesson as completed
     */
    public function completeLesson(Lesson $lesson, int $timeSpent = 0): void
    {
        if (!$this->hasCompletedLesson($lesson)) {
            $this->lessonCompletions()->create([
                'lesson_id' => $lesson->id,
                'completed_at' => now(),
                'time_spent' => $timeSpent,
            ]);

            // Update course progress
            $enrollment = $this->getEnrollmentFor($lesson->course);
            if ($enrollment) {
                $enrollment->updateProgress();
            }

            // Check for new badges
            Badge::checkAndAwardBadges($this);
        }
    }

    /**
     * Get progress for a specific course
     */
    public function getCourseProgress(Course $course): float
    {
        $enrollment = $this->getEnrollmentFor($course);
        return $enrollment?->progress_percentage ?? 0;
    }

    /**
     * Get next lesson to study
     */
    public function getNextLesson(): ?Lesson
    {
        $activeEnrollments = $this->activeEnrollments()->with('course.lessons')->get();
        
        foreach ($activeEnrollments as $enrollment) {
            $nextLesson = $enrollment->getNextLesson();
            if ($nextLesson) {
                return $nextLesson;
            }
        }
        
        return null;
    }
}
