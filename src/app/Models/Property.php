<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'exchange_1c'
    ];

    public static function createByML(\App\Exchanges\OneC\Commerce\Model\Property $property)
    {
        if (!$model = static::where('exchange_1c', $property->id)->first()) {
            $model = new self;
            $model->exchange_1c = $property->id;
        }

        $model->name = $property->name;
            
        $model->save();
   
        return $model;
    }
}