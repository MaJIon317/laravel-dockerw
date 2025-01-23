<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailConstructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'tags',
        'text',
        'html',
        'json',
        'attachments',

        'track_open',
        'track_click',
        'track_maps',
    ];

    protected function casts(): array
    {
        return [
            'track_maps' => 'array',
        ];
    }

    public function sends(): HasMany
    {
        return $this->hasMany(EmailConstructorSend::class, 'email_constructor_id');
    }
}
 