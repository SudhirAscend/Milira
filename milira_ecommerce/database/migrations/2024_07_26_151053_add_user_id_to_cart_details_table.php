<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToCartDetailsTable extends Migration
{
    public function up()
    {
        // Check if the column doesn't exist before adding it
        if (!Schema::hasColumn('cart_details', 'user_id')) {
            Schema::table('cart_details', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->after('id');
            });
        }
    }

    public function down()
    {
        Schema::table('cart_details', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
