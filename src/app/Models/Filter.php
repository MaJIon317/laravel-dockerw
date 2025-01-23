<?php

namespace App\Models;

use App\AttributeTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory, AttributeTrait;

    public $timestamps = false;
    
    protected $fillable = [
        'type',
        'slug',
        'order',
        'status',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(FilterTranslation::class);
    }
}