<?php

namespace App\Models;

use App\OrderStatus;
use App\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'delivery_method',
        'delivery_address',
        'payment_method',
        'status',
        'payment_status',
        'type',
        'subtotal',
        'delivery_fee',
        'tax_amount',
        'total_amount',
        'notes',
        'meta_data',
        'shipped_at',
        'delivered_at',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'delivery_fee' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'meta_data' => 'array',
        'shipped_at' => 'datetime',
        'delivered_at' => 'datetime',
        'status' => OrderStatus::class,
        'payment_status' => PaymentStatus::class,
    ];

    /**
     * Boot the model
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = 'AKAAT-' . date('Y') . '-' . str_pad(static::count() + 1, 6, '0', STR_PAD_LEFT);
            }
        });
    }

    /**
     * Get the user that owns the order
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order items
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
    
    /**
     * Get the order items (alias)
     */
    public function items(): HasMany
    {
        return $this->orderItems();
    }

    /**
     * Scope to get orders by status
     */
    public function scopeByStatus($query, OrderStatus $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope to get orders by payment status
     */
    public function scopeByPaymentStatus($query, PaymentStatus $status)
    {
        return $query->where('payment_status', $status);
    }

    /**
     * Check if order can be cancelled
     */
    public function canBeCancelled(): bool
    {
        return in_array($this->status, [OrderStatus::Pending, OrderStatus::Confirmed]);
    }

    /**
     * Check if order is paid
     */
    public function isPaid(): bool
    {
        return $this->payment_status === PaymentStatus::Completed;
    }

    /**
     * Check if order is shipped
     */
    public function isShipped(): bool
    {
        return in_array($this->status, [OrderStatus::Shipped, OrderStatus::Delivered]);
    }

    /**
     * Get the customer name
     */
    public function getCustomerNameAttribute(): string
    {
        return $this->attributes['customer_name'] ?? ($this->user ? $this->user->name : 'Guest Customer');
    }

    /**
     * Get the customer email
     */
    public function getCustomerEmailAttribute(): ?string
    {
        return $this->attributes['customer_email'] ?? ($this->user ? $this->user->email : null);
    }

    /**
     * Calculate order totals
     */
    public function calculateTotals(): void
    {
        $this->subtotal = $this->orderItems->sum('total_price');
        $this->total_amount = $this->subtotal + $this->delivery_fee + $this->tax_amount;
        $this->save();
    }
}
  