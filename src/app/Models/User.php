<?php

namespace App\Models;

use App\Filters\Admin\UserFilter;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Exchanges\OneC\Interfaces\PartnerInterface;

class User extends Authenticatable implements MustVerifyEmail, PartnerInterface
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'inn',
        'name',
        'phone',
        'city',
        'address',
        'ip',
        'send_welcome',
        'email',
        'email_verified_at',
        'password',

        'bitrix'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        //'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class)->orderByDesc('created_at');
    }

    public function scopeAdminFilter(Builder $builder, $request)
    {
        return (new UserFilter($request))->filter($builder);
    }


    /**
     * @param mixed|null $context
     *
     * @return array
     */ 
    public function getExportFields1c($context = null)
    {
        
    }
}
