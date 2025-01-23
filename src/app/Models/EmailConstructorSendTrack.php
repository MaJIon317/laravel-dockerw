<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailConstructorSendTrack extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_constructor_send_id',
        'key',
        'count',
    ];

    protected function casts(): array
    {
        return [
            'key' => 'integer',
            'count' => 'integer',
        ];
    }

    public function constructor(): BelongsTo
    {
        return $this->belongsTo(EmailConstructorSend::class, 'email_constructor_send_id');
    }
}