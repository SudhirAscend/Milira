<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('small_description')->nullable();
                $table->text('description')->nullable();
                $table->string('images')->nullable(); // For storing image paths
                $table->string('category')->nullable();
                $table->string('collection')->nullable();
                $table->string('tags')->nullable();
                $table->string('sku')->nullable();
                $table->string('color')->nullable();
                $table->string('size')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
