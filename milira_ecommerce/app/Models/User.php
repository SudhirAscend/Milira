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
        'provider',          // Add this line
        'provider_id',       // Add this line
    ];

    protected $hidden = [
        'otp',
               // Ensure password is hidden
        'remember_token',    // If you are using this feature
    ];

    protected $casts = [
        'otp_expires_at' => 'datetime',
    ];
}
