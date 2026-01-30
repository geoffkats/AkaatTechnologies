<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'short_description',
        'features',
        'pricing',
        'delivery_time',
        'status',
        'featured',
        'portfolio',
        'meta_data',
    ];

    protected $casts = [
        'features' => 'array',
        'pricing' => 'array',
        'portfolio' => 'array',
        'meta_data' => 'array',
        'featured' => 'boolean',
    ];

    /**
     * Boot the model
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });
    }

    /**
     * Get the order items for the service
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the reviews for the service
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Scope to get only active services
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope to get featured services
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope to get services by category
     */
    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Get the starting price for the service
     */
    public function getStartingPriceAttribute(): ?float
    {
        if (!$this->pricing || !is_array($this->pricing)) {
            return null;
        }

        $prices = collect($this->pricing)->pluck('price')->filter();
        return $prices->min();
    }

    /**
     * Get average rating
     */
    public function getAverageRatingAttribute(): float
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    /**
     * Get total reviews count
     */
    public function getReviewsCountAttribute(): int
    {
        return $this->reviews()->count();
    }

    /**
     * Get category label
     */
    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'printing' => 'Printing & Stationery',
            'web_development' => 'Web Development',
            'software_development' => 'Software Development',
            'training' => 'Training Programs',
            default => ucfirst(str_replace('_', ' ', $this->category)),
        };
    }
}
