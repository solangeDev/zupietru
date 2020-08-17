<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRowsMultimediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rows_multimedias', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('row_id');
            $table->foreign('row_id')->references('id')->on('rows');

            $table->unsignedInteger('multimedia_id');
            $table->foreign('multimedia_id')->references('id')->on('multimedias');

            $table->unsignedInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');

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
        Schema::dropIfExists('rows_multimedias');
    }
}
