<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_add_otp_to_admins_table.php
public function up()
{
    Schema::table('admins', function (Blueprint $table) {
        $table->string('otp')->nullable(); // Add the OTP column
    });
}

public function down()
{
    Schema::table('admins', function (Blueprint $table) {
        $table->dropColumn('otp');
    });
}

};
