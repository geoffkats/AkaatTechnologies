<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'thumbnail',
        'video_preview',
        'price',
        'level',
        'category',
        'duration_hours',
        'total_lessons',
        'learning_outcomes',
        'prerequisites',
        'status',
        'featured',
        'max_students',
        'start_date',
        'end_date',
        'schedule',
        'instructor_name',
        'instructor_bio',
        'instructor_image',
        'meta_data',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'duration_hours' => 'integer',
        'total_lessons' => 'integer',
        'learning_outcomes' => 'array',
        'prerequisites' => 'array',
        'featured' => 'boolean',
        'max_students' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'schedule' => 'array',
        'meta_data' => 'array',
    ];

    protected static function boot(): void
    {
        parent::boot();
        
        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title);
            }
        });
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->orderBy('sort_order');
    }

    public function publishedLessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->where('is_published', true)->orderBy('sort_order');
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function activeEnrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class)->where('status', 'active');
    }

    public function completedEnrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class)->where('status', 'completed');
    }

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }

    public function badges(): BelongsToMany
    {
        return $this->belongsToMany(Badge::class, 'course_badges');
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeByLevel($query, $level)
    {
        return $query->where('level', $level);
    }

    // Accessors
    public function getFormattedPriceAttribute(): string
    {
        $discountedPrice = $this->meta_data['discounted_price'] ?? null;
        if ($discountedPrice && $discountedPrice < $this->price) {
            return 'UGX ' . number_format($discountedPrice);
        }
        return 'UGX ' . number_format($this->price);
    }

    public function getOriginalPriceAttribute(): ?string
    {
        $discountedPrice = $this->meta_data['discounted_price'] ?? null;
        if ($discountedPrice && $discountedPrice < $this->price) {
            return 'UGX ' . number_format($this->price);
        }
        return null;
    }

    public function getDiscountPercentageAttribute(): ?int
    {
        $discountedPrice = $this->meta_data['discounted_price'] ?? null;
        if ($discountedPrice && $discountedPrice < $this->price) {
            return round((($this->price - $discountedPrice) / $this->price) * 100);
        }
        return null;
    }

    public function getTotalLessonsAttribute(): int
    {
        return $this->lessons()->count();
    }

    public function getCompletionRateAttribute(): float
    {
        $totalEnrollments = $this->enrollments()->count();
        if ($totalEnrollments === 0) {
            return 0;
        }
        
        $completedEnrollments = $this->completedEnrollments()->count();
        return round(($completedEnrollments / $totalEnrollments) * 100, 1);
    }

    public function getAverageRatingAttribute(): float
    {
        // This would be calculated from course reviews if implemented
        return 4.5; // Placeholder
    }

    public function getStudentCountAttribute(): int
    {
        return $this->enrollments()->count();
    }

    public function getTagsAttribute(): array
    {
        return $this->meta_data['tags'] ?? [];
    }

    public function getRequirementsAttribute(): array
    {
        return $this->prerequisites ?? [];
    }

    public function getWhatYouLearnAttribute(): array
    {
        return $this->learning_outcomes ?? [];
    }

    public function getIsPublishedAttribute(): bool
    {
        return $this->status === 'published';
    }

    public function getIsFeaturedAttribute(): bool
    {
        return $this->featured;
    }

    public function getDifficultyLevelAttribute(): string
    {
        return $this->level;
    }

    // Helper methods
    public function isEnrolledBy(User $user): bool
    {
        return $this->enrollments()->where('user_id', $user->id)->exists();
    }

    public function getEnrollmentFor(User $user): ?Enrollment
    {
        return $this->enrollments()->where('user_id', $user->id)->first();
    }

    public function canBeAccessedBy(User $user): bool
    {
        return $this->isEnrolledBy($user) && $this->status === 'published';
    }
}
