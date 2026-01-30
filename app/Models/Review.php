<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'service_id',
        'reviewable_type',
        'rating',
        'title',
        'comment',
        'is_approved',
        'approved_at',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'approved_at' => 'datetime',
    ];

    /**
     * Get the user that wrote the review
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product (if this is a product review)
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the service (if this is a service review)
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the reviewable item (product or service)
     */
    public function getReviewableAttribute()
    {
        return $this->reviewable_type === 'product' ? $this->product : $this->service;
    }

    /**
     * Scope to get approved reviews
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope to get pending reviews
     */
    public function scopePending($query)
    {
        return $query->where('is_approved', false);
    }

    /**
     * Scope to get product reviews
     */
    public function scopeForProducts($query)
    {
        return $query->where('reviewable_type', 'product');
    }

    /**
     * Scope to get service reviews
     */
    public function scopeForServices($query)
    {
        return $query->where('reviewable_type', 'service');
    }

    /**
     * Get star rating as array for display
     */
    public function getStarsAttribute(): array
    {
        return array_fill(0, 5, false);
    }

    /**
     * Get filled stars for display
     */
    public function getFilledStarsAttribute(): array
    {
        $stars = array_fill(0, 5, false);
        for ($i = 0; $i < $this->rating; $i++) {
            $stars[$i] = true;
        }
        return $stars;
    }
}
