<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'description',
        'content',
        'video_url',
        'attachments',
        'duration_minutes',
        'sort_order',
        'type',
        'is_free',
        'is_published',
        'meta_data',
    ];

    protected $casts = [
        'attachments' => 'array',
        'duration_minutes' => 'integer',
        'sort_order' => 'integer',
        'is_free' => 'boolean',
        'is_published' => 'boolean',
        'meta_data' => 'array',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function completions(): HasMany
    {
        return $this->hasMany(LessonCompletion::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopePreview($query)
    {
        return $query->where('is_free', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    // Accessors
    public function getFormattedDurationAttribute(): string
    {
        if (!$this->duration_minutes) {
            return '0:00';
        }
        
        $hours = floor($this->duration_minutes / 60);
        $minutes = $this->duration_minutes % 60;
        
        if ($hours > 0) {
            return sprintf('%d:%02d', $hours, $minutes);
        }
        
        return sprintf('%d min', $minutes);
    }

    public function getVideoDurationAttribute(): int
    {
        return $this->duration_minutes * 60; // Convert to seconds for backward compatibility
    }

    public function getResourcesAttribute(): array
    {
        return $this->attachments ?? [];
    }

    public function getIsPreviewAttribute(): bool
    {
        return $this->is_free;
    }

    public function getVideoTypeAttribute(): string
    {
        if (!$this->video_url) {
            return 'none';
        }
        
        if (str_contains($this->video_url, 'youtube.com') || str_contains($this->video_url, 'youtu.be')) {
            return 'youtube';
        }
        
        if (str_contains($this->video_url, 'vimeo.com')) {
            return 'vimeo';
        }
        
        return 'direct';
    }

    public function getVideoEmbedUrlAttribute(): ?string
    {
        if (!$this->video_url) {
            return null;
        }
        
        if ($this->video_type === 'youtube') {
            // Extract video ID and create embed URL
            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\n?#]+)/', $this->video_url, $matches);
            if (isset($matches[1])) {
                return "https://www.youtube.com/embed/{$matches[1]}";
            }
        }
        
        if ($this->video_type === 'vimeo') {
            // Extract video ID and create embed URL
            preg_match('/vimeo\.com\/(\d+)/', $this->video_url, $matches);
            if (isset($matches[1])) {
                return "https://player.vimeo.com/video/{$matches[1]}";
            }
        }
        
        return $this->video_url;
    }

    // Helper methods
    public function isCompletedBy(User $user): bool
    {
        return $this->completions()->where('user_id', $user->id)->exists();
    }

    public function markAsCompletedBy(User $user): void
    {
        if (!$this->isCompletedBy($user)) {
            $this->completions()->create([
                'user_id' => $user->id,
                'completed_at' => now(),
            ]);
        }
    }

    public function canBeAccessedBy(User $user): bool
    {
        if ($this->is_free) {
            return true;
        }
        
        return $this->course->canBeAccessedBy($user);
    }

    public function getNextLesson(): ?self
    {
        return $this->course->lessons()
            ->where('sort_order', '>', $this->sort_order)
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->first();
    }

    public function getPreviousLesson(): ?self
    {
        return $this->course->lessons()
            ->where('sort_order', '<', $this->sort_order)
            ->where('is_published', true)
            ->orderBy('sort_order', 'desc')
            ->first();
    }
}
