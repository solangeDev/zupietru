<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPresentationTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_presentation_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_presentation_id');
            $table->foreign('product_presentation_id', 'product_presentation_translations_product_presentation_id_fk')->references('id')->on('product_presentations');

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
        Schema::dropIfExists('product_presentation_translations');
    }
}
