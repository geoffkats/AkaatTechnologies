<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'template',
        'status',
        'meta_data',
        'is_homepage',
        'sort_order',
    ];

    protected $casts = [
        'meta_data' => 'array',
        'is_homepage' => 'boolean',
    ];

    /**
     * Boot the model
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($page) {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }
        });
    }

    /**
     * Scope to get published pages
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope to get the homepage
     */
    public function scopeHomepage($query)
    {
        return $query->where('is_homepage', true);
    }

    /**
     * Get the meta title
     */
    public function getMetaTitleAttribute(): string
    {
        return $this->meta_data['title'] ?? $this->title;
    }

    /**
     * Get the meta description
     */
    public function getMetaDescriptionAttribute(): ?string
    {
        return $this->meta_data['description'] ?? $this->excerpt;
    }

    /**
     * Get the meta keywords
     */
    public function getMetaKeywordsAttribute(): ?string
    {
        return $this->meta_data['keywords'] ?? null;
    }
}
