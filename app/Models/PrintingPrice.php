<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrintingPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'paper_type',
        'paper_size', 
        'color_type',
        'print_type',
        'price_per_page',
        'bulk_discount_threshold',
        'bulk_discount_price',
        'is_active',
        'description'
    ];

    protected $casts = [
        'price_per_page' => 'decimal:2',
        'bulk_discount_threshold' => 'decimal:2',
        'bulk_discount_price' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    /**
     * Get active pricing options
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get price for specific configuration
     */
    public static function getPriceForConfig($paperType, $paperSize, $colorType, $printType, $quantity = 1)
    {
        $pricing = self::active()
            ->where('paper_type', $paperType)
            ->where('paper_size', $paperSize)
            ->where('color_type', $colorType)
            ->where('print_type', $printType)
            ->first();

        if (!$pricing) {
            return 0;
        }

        // Check if bulk discount applies
        if ($pricing->bulk_discount_threshold && $quantity >= $pricing->bulk_discount_threshold && $pricing->bulk_discount_price) {
            return $pricing->bulk_discount_price;
        }

        return $pricing->price_per_page;
    }

    /**
     * Calculate total cost for printing job
     */
    public static function calculateTotal($paperType, $paperSize, $colorType, $printType, $quantity, $copies = 1)
    {
        $pricePerPage = self::getPriceForConfig($paperType, $paperSize, $colorType, $printType, $quantity * $copies);
        return $pricePerPage * $quantity * $copies;
    }

    /**
     * Get all available paper types
     */
    public static function getAvailablePaperTypes()
    {
        return self::active()->distinct()->pluck('paper_type')->toArray();
    }

    /**
     * Get all available paper sizes
     */
    public static function getAvailablePaperSizes()
    {
        return self::active()->distinct()->pluck('paper_size')->toArray();
    }

    /**
     * Get formatted price in UGX
     */
    public function getFormattedPriceAttribute()
    {
        return 'UGX ' . number_format($this->price_per_page);
    }

    /**
     * Get formatted bulk price in UGX
     */
    public function getFormattedBulkPriceAttribute()
    {
        if ($this->bulk_discount_price) {
            return 'UGX ' . number_format($this->bulk_discount_price);
        }
        return null;
    }
}
