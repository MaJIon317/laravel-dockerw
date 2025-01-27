<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterValue extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'filter_id',
        'slug',
        'order',
        'status',
    ];
}