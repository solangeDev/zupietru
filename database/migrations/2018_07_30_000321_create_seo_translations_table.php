<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag', 150)->nullable()->default(null);
            $table->text('value')->nullable()->default(null);

            $table->unsignedInteger('seo_id');
            $table->foreign('seo_id')->references('id')->on('seos');

            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages');

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
        Schema::dropIfExists('seo_translations');
    }
}
