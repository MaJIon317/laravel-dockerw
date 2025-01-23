<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTotal extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'code',
        'value'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
