<?php

namespace App\Models;

use App\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'sale_price',
        'sku',
        'stock_quantity',
        'low_stock_threshold',
        'category_id',
        'status',
        'featured',
        'weight',
        'dimensions',
        'images',
        'meta_data',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'weight' => 'decimal:2',
        'featured' => 'boolean',
        'images' => 'array',
        'meta_data' => 'array',
        'status' => ProductStatus::class,
    ];

    /**
     * Boot the model
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
            if (empty($product->sku)) {
                $product->sku = 'AKAAT-' . strtoupper(Str::random(8));
            }
        });
    }

    /**
     * Get the category that owns the product
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the order items for the product
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the reviews for the product
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the wishlist items for the product
     */
    public function wishlistItems(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Scope to get only active products
     */
    public function scopeActive($query)
    {
        return $query->where('status', ProductStatus::Active);
    }

    /**
     * Scope to get featured products
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope to get products in stock
     */
    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    /**
     * Check if product is in stock
     */
    public function isInStock(): bool
    {
        return $this->stock_quantity > 0;
    }

    /**
     * Check if product is low stock
     */
    public function isLowStock(): bool
    {
        return $this->stock_quantity <= $this->low_stock_threshold;
    }

    /**
     * Get the current price (sale price if available, otherwise regular price)
     */
    public function getCurrentPriceAttribute(): float
    {
        return $this->sale_price ?? $this->price;
    }

    /**
     * Check if product is on sale
     */
    public function isOnSale(): bool
    {
        return $this->sale_price !== null && $this->sale_price < $this->price;
    }

    /**
     * Get the discount percentage
     */
    public function getDiscountPercentageAttribute(): ?int
    {
        if (!$this->isOnSale()) {
            return null;
        }

        return round((($this->price - $this->sale_price) / $this->price) * 100);
    }

    /**
     * Get the primary image
     */
    public function getPrimaryImageAttribute(): ?string
    {
        return $this->images[0] ?? null;
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
     * Get formatted price in UGX
     */
    public function getFormattedPriceAttribute(): string
    {
        return $this->formatPrice($this->current_price);
    }

    /**
     * Get formatted original price in UGX
     */
    public function getFormattedOriginalPriceAttribute(): string
    {
        return $this->formatPrice($this->price);
    }

    /**
     * Get formatted discount amount in UGX
     */
    public function getFormattedDiscountAmountAttribute(): string
    {
        if (!$this->isOnSale()) {
            return '0';
        }
        
        return $this->formatPrice($this->price - $this->sale_price);
    }

    /**
     * Get discount amount
     */
    public function getDiscountAmountAttribute(): float
    {
        if (!$this->isOnSale()) {
            return 0;
        }
        
        return $this->price - $this->sale_price;
    }

    /**
     * Get original price (for display purposes)
     */
    public function getOriginalPriceAttribute(): float
    {
        return $this->price;
    }

    /**
     * Get stock quantity
     */
    public function getStockAttribute(): int
    {
        return $this->stock_quantity;
    }

    /**
     * Get rating (average rating)
     */
    public function getRatingAttribute(): float
    {
        return $this->average_rating;
    }

    /**
     * Get image URL (primary image)
     */
    public function getImageUrlAttribute(): ?string
    {
        // First check if images array exists and has items
        if ($this->images && is_array($this->images) && count($this->images) > 0) {
            return $this->images[0];
        }
        
        // Fallback to primary_image attribute
        return $this->primary_image;
    }

    /**
     * Format price to UGX format (750K, 1.5M, etc.)
     */
    private function formatPrice(float $price): string
    {
        if ($price >= 1000000) {
            return number_format($price / 1000000, 1) . 'M';
        } elseif ($price >= 1000) {
            return number_format($price / 1000, 0) . 'K';
        } else {
            return number_format($price, 0);
        }
    }
}
