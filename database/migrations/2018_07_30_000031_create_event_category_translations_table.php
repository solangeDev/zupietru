<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_category_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('event_category_id');
            $table->foreign('event_category_id')->references('id')->on('event_categories');

            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages');

            $table->string('name', 30);
            $table->string('description', 50);
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
        Schema::dropIfExists('event_category_translations');
    }
}
