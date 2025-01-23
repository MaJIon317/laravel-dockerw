<?php

namespace App\Models;

use App\SlugTrait;
use App\AttributeTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, SlugTrait, AttributeTrait;

    protected $fillable = [
        'image',
        'banner',
        'title',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'slug',
        'publish_date',
        'status',

        'bitrix'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function scopeStatus($query)
    {
        return $query->where('status', 1)->where([
            ['status', 1],
            ['publish_date', '<=', Carbon::now()],
            ['publish_date', '!=', null]
        ])->orWhere([
            ['status', 1],
            ['publish_date', null]
        ]);
    }

    public function scopeNotStatus($query)
    {
        return $query->where('status', 0)->orWhere('publish_date', '>', Carbon::now());
    }
}
