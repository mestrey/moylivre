<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ADMIN_ID = 1;

    public const USER_1_ID = 2;
    public const USER_2_ID = 3;

    public const MOSCOW_LAT = 55.751244;
    public const MOSCOW_LON = 37.618423;
    public const ST_PETERSBURG_LAT = 59.934280;
    public const ST_PETERSBURG_LON = 30.335098;

    protected $fillable = [
        'last',
        'first',
        'email',
        'latitude',
        'longitude',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class);
    }
}
