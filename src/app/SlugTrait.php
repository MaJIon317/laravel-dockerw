<?php

namespace App;

use Illuminate\Support\Str;

trait SlugTrait
{
    protected static function boot()
    {
        parent::boot();

        static::created(function ($property) {
            $property->slug = $property->createSlug($property->title ? $property->title : fake()->slug());
            $property->save();
        });
    }

    /** 
     * create slug
     *
     * @return response()
     */
    private function createSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

            if ($max && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }

            return "{$slug}-2";
        }

        return $slug;
    }

    public static function findOrFailBySlug($slug)
    {
        return static::selectBySlug($slug)->firstOrFail();
    }

    public static function findBySlug($slug)
    {
        return static::selectBySlug($slug)->first();
    }

    private static function selectBySlug($slug)
    {
        $query = new self();
 
        if (in_array('status', $query->getFillable())) {
            return $query->where($query->getTable() . '.slug', $slug)->where('status', 1);
        } else {
            return $query->where($query->getTable() . '.slug', $slug);
        }
    }
}
