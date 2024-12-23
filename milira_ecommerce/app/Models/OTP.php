<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    use HasFactory;

    protected $table = 'otps'; // Specify the correct table name

    protected $fillable = [
        'email',
        'otp',
    ];
}
