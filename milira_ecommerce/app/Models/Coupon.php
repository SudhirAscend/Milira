<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Coupon extends Model
{
    protected $fillable = ['code', 'type', 'value', 'usage_limit', 'expiry_date'];

    protected $casts = [
        'expiry_date' => 'datetime', // Ensure expiry_date is treated as a Carbon instance
    ];

    public function isExpired()
    {
        return $this->expiry_date && $this->expiry_date->isPast();
    }
}
