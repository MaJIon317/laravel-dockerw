<?php

namespace App\Models;

use App\SlugTrait;
use App\AttributeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory, SlugTrait, AttributeTrait;

    protected $fillable = [
        'title',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'slug',
        'status'
    ];

    protected $casts = [
        'status' => 'integer'
    ];

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

    public function scopeNotStatus($query)
    {
        return $query->where('status', 0);
    }
}
