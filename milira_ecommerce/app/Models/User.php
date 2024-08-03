<?php


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'login_type',
        'is_verified',
        'otp',
        'otp_expires_at',
    ];

    protected $hidden = [
        'otp',
    ];

    protected $casts = [
        'otp_expires_at' => 'datetime',
    ];
}
