<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // New column for user_id
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key constraint
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_details');
    }
}
