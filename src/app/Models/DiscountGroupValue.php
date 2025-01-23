<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountGroupValue extends Model
{
    use HasFactory;

    public $increments = false;
    public $timestamps = false;

    protected $fillable = [
        'discount_group_id',
        'percent',
        'amount'
    ];
}
