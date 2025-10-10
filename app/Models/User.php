<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nationality_id',
        'user_type_id',
        'currency_id',
        'us_state_id',
        'full_name',
        'username',
        'email',
        'password',
        'profile_image',
        'phone_country_code',
        'local_phone',
    ];

    protected $hidden = [
        'password',
        //'remember_token',
    ];

    protected $casts = [
    'email_verified_at' => 'datetime',
    ];

    // Relaciones
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function usState()
    {
        return $this->belongsTo(UsState::class);
    }
}