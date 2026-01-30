<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'type',
        'media_url',
        'thumbnail_url',
        'featured',
        'status',
        'sort_order',
        'meta_data',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
        'meta_data' => 'array',
    ];

    /**
     * Boot the model
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });
    }

    /**
     * Scope to get only active portfolios
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope to get featured portfolios
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope to get portfolios by category
     */
    public function scopeByCategory($query, string $category)
    {
        if ($category === 'all') {
            return $query;
        }
        return $query->where('category', $category);
    }

    /**
     * Get category label
     */
    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'printing' => 'Printing & Stationery',
            'web' => 'Web Development',
            'software' => 'Software Development',
            'training' => 'Training Programs',
            default => ucfirst($this->category),
        };
    }

    /**
     * Get YouTube video ID from URL
     */
    public function getYoutubeVideoIdAttribute(): ?string
    {
        if ($this->type !== 'video') {
            return null;
        }

        $url = $this->media_url;
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches);
        
        return $matches[1] ?? null;
    }

    /**
     * Get YouTube thumbnail URL
     */
    public function getYoutubeThumbnailAttribute(): ?string
    {
        $videoId = $this->youtube_video_id;
        if (!$videoId) {
            return null;
        }

        return "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
    }

    /**
     * Get display URL (thumbnail for videos, media_url for images)
     */
    public function getDisplayUrlAttribute(): string
    {
        if ($this->type === 'video') {
            return $this->thumbnail_url ?: $this->youtube_thumbnail ?: $this->media_url;
        }

        return $this->media_url;
    }

    /**
     * Check if it's a YouTube video
     */
    public function getIsYoutubeVideoAttribute(): bool
    {
        return $this->type === 'video' && str_contains($this->media_url, 'youtube');
    }
}
