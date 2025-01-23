<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'permission'
    ];

    protected function casts(): array
    {
        return [
            'permission' => 'array',
        ];
    }

    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class);
    }
} 
