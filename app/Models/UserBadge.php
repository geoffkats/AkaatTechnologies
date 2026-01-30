<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserBadge extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'badge_id',
        'earned_at',
        'points_awarded',
        'notes',
    ];

    protected $casts = [
        'earned_at' => 'datetime',
        'points_awarded' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function badge(): BelongsTo
    {
        return $this->belongsTo(Badge::class);
    }

    // Accessors
    public function getFormattedPointsAttribute(): string
    {
        return number_format($this->points_awarded) . ' points';
    }

    public function getEarnedDateAttribute(): string
    {
        return $this->earned_at?->format('M j, Y') ?? 'Unknown';
    }

    public function getTimeAgoAttribute(): string
    {
        return $this->earned_at?->diffForHumans() ?? 'Unknown';
    }
}
