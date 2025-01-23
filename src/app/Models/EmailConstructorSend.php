<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailConstructorSend extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_constructor_id',
        'email',
        'read',
        'unsubscribe',
        'count',
    ];

    public function tracks(): HasMany
    {
        return $this->hasMany(EmailConstructorSendTrack::class, 'email_constructor_send_id');
    }

    public function constructor(): BelongsTo
    {
        return $this->belongsTo(EmailConstructor::class, 'email_constructor_id');
    }
}
