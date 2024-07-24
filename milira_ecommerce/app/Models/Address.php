<?php
// app/Models/Address.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'address',
        'city',
        'postcode',
        'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
