<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_centers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('bussiness_details');
            $table->text('bussiness_name');
            $table->text('shop_address');
            $table->text('contact_person');
            $table->text('tel_office');
            $table->text('mobile');
            $table->text('bussiness_licence_number');
            $table->text('gov_id');
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
        Schema::dropIfExists('service_centers');
    }
}
