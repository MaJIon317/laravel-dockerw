<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'percent',
        'discount',
        'publish_start',
        'publish_end',
        'count_uses',
        'status',
    ];

    protected $casts = [
        'status' => 'integer'
    ];

    public function history(): HasMany
    {
        return $this->hasMany(CouponHistory::class);
    }
}
