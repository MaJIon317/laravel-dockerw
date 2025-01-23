<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterValueProduct extends Model
{
    use HasFactory;

    public $incrementing = false;
    
    public $timestamps = false;

    protected $fillable = [
        'filter_value_id',
        'product_id',
    ];
}
