<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponPopup extends Model
{
    protected $fillable = ['title', 'description', 'coupon_code', 'image'];
}
