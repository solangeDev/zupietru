<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_services', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');

            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms_services');
    }
}
