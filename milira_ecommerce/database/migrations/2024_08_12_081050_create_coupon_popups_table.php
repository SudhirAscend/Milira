<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponPopupsTable extends Migration
{
    public function up()
    {
        Schema::create('coupon_popups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('coupon_code');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupon_popups');
    }
}
