<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'type',
        'criteria',
        'is_active',
        'points',
        'meta_data',
    ];

    protected $casts = [
        'criteria' => 'array',
        'points' => 'integer',
        'is_active' => 'boolean',
        'meta_data' => 'array',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_badges')
            ->withPivot(['earned_at', 'points_awarded'])
            ->withTimestamps();
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_badges');
    }

    public function userBadges(): HasMany
    {
        return $this->hasMany(UserBadge::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('points');
    }

    public function scopeByPoints($query, $operator = '>=', $points = 0)
    {
        return $query->where('points', $operator, $points);
    }

    // Accessors
    public function getFormattedPointsAttribute(): string
    {
        return number_format($this->points) . ' points';
    }

    public function getIconUrlAttribute(): string
    {
        if ($this->icon && str_starts_with($this->icon, 'http')) {
            return $this->icon;
        }
        
        // Return a default badge icon or emoji
        return $this->icon ?: '🏆';
    }

    public function getColorClassAttribute(): string
    {
        $colorMap = [
            'gold' => 'bg-yellow-500',
            'silver' => 'bg-gray-400',
            'bronze' => 'bg-orange-600',
            'blue' => 'bg-blue-500',
            'green' => 'bg-green-500',
            'red' => 'bg-red-500',
            'purple' => 'bg-purple-500',
        ];
        
        return $colorMap[$this->color] ?? 'bg-gray-500';
    }

    public function getTextColorClassAttribute(): string
    {
        return 'text-white'; // Most badge colors work well with white text
    }

    // Helper methods
    public function isEarnedBy(User $user): bool
    {
        return $this->users()->where('user_id', $user->id)->exists();
    }

    public function getEarnedDateFor(User $user): ?string
    {
        $userBadge = $this->users()->where('user_id', $user->id)->first();
        return $userBadge?->pivot->earned_at?->format('M j, Y');
    }

    public function getTotalEarnedCount(): int
    {
        return $this->users()->count();
    }

    public function checkCriteriaFor(User $user): bool
    {
        if (!$this->criteria || !is_array($this->criteria)) {
            return false;
        }
        
        foreach ($this->criteria as $criterion) {
            if (!$this->checkSingleCriterion($user, $criterion)) {
                return false;
            }
        }
        
        return true;
    }

    protected function checkSingleCriterion(User $user, array $criterion): bool
    {
        $type = $criterion['type'] ?? '';
        $value = $criterion['value'] ?? 0;
        $operator = $criterion['operator'] ?? '>=';
        
        switch ($type) {
            case 'courses_completed':
                $userValue = $user->enrollments()->completed()->count();
                break;
                
            case 'total_points':
                $userValue = $user->badges()->sum('points');
                break;
                
            case 'lessons_completed':
                $userValue = LessonCompletion::where('user_id', $user->id)->count();
                break;
                
            case 'quizzes_passed':
                $userValue = QuizAttempt::where('user_id', $user->id)
                    ->where('passed', true)
                    ->distinct('quiz_id')
                    ->count();
                break;
                
            case 'study_streak_days':
                // This would require tracking daily activity
                $userValue = 0; // Placeholder
                break;
                
            case 'course_category':
                // Check if user completed a course in specific category
                $category = $criterion['category'] ?? '';
                $userValue = $user->enrollments()
                    ->completed()
                    ->whereHas('course', function ($query) use ($category) {
                        $query->where('category', $category);
                    })
                    ->count();
                break;
                
            default:
                return false;
        }
        
        return $this->compareValues($userValue, $operator, $value);
    }

    protected function compareValues($userValue, string $operator, $targetValue): bool
    {
        return match ($operator) {
            '>=' => $userValue >= $targetValue,
            '>' => $userValue > $targetValue,
            '<=' => $userValue <= $targetValue,
            '<' => $userValue < $targetValue,
            '==' => $userValue == $targetValue,
            '!=' => $userValue != $targetValue,
            default => false,
        };
    }

    public static function checkAndAwardBadges(User $user): array
    {
        $awardedBadges = [];
        
        $availableBadges = static::active()
            ->whereNotIn('id', $user->badges()->pluck('badges.id'))
            ->get();
        
        foreach ($availableBadges as $badge) {
            if ($badge->checkCriteriaFor($user)) {
                $user->awardBadge($badge);
                $awardedBadges[] = $badge;
            }
        }
        
        return $awardedBadges;
    }
}
