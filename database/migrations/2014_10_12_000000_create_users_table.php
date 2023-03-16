<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->integer('phone_number')->unique();
            $table->integer('is_admin')->default(0);
            $table->integer('is_investor')->default(0);
            $table->integer('level')->default(1);
            $table->integer('is_subscriber')->default(0);
            $table->integer('status')->default(1);
            $table->integer('referrer_of')->nullable();
            $table->integer('is_service_center')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
