<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 50);

            $table->double('price', 8, 2)->nullable()->default(null);
            $table->float('tax', 5)->nullable()->default(null);
            $table->integer('for_delivery')->boolean()->nullable()->default(null);

            $table->string('code', 10)->nullable()->default(null);
            $table->integer('is_additional')->boolean()->nullable()->default(null)->comment('To indicate if the product is an additional.');

            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('product_subcategories');

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
        Schema::dropIfExists('products');
    }
}
