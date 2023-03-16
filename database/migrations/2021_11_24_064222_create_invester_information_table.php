<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvesterInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invester_information', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('investment_amount');
            $table->string('referal_earning');
            $table->string('investment_return')->nullable();
            $table->date('withdraw_at')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('invester_information');
    }
}
