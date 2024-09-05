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
        'provider',
        'provider_id',
        'google_id',
    ];

    protected $hidden = [
        'otp',
        // Removed password from hidden
        'remember_token',
    ];

    protected $casts = [
        'otp_expires_at' => 'datetime',
    ];
    // In User model
public function getFullNameAttribute()
{
    return $this->attributes['full_name'];
}

public function addresses()
    {
        return $this->hasMany(Address::class);
    }

}
