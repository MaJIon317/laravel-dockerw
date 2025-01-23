<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterValueTranslation extends Model
{
    use HasFactory;

    public $incrementing = false;
    
    public $timestamps = false;

    protected $fillable = [
        'filter_value_id',
        'locale',
        'name',
        'description',
    ];
}
