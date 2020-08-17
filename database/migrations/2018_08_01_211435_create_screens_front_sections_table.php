<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreensFrontSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screens_front_sections', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('screen_id');
            $table->foreign('screen_id')->references('id')->on('screens');

            $table->unsignedInteger('front_section_id');
            $table->foreign('front_section_id')->references('id')->on('front_sections');

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
        Schema::dropIfExists('screens_front_sections');
    }
}
