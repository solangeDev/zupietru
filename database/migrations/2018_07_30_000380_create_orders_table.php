<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10)->nullable()->default(null);
            $table->double('total', 8, 2);
            $table->double('subtotal', 8, 2);
            $table->float('tax', 5);
            $table->string('shipping_address', 500);

            $table->text('address')->nullable()->default(null);
            $table->text('state')->nullable()->default(null);
            $table->text('city')->nullable()->default(null);
            $table->text('zip')->nullable()->default(null);
            $table->text('lat')->nullable()->default(null);
            $table->text('lng')->nullable()->default(null);
            $table->text('phone')->nullable()->default(null);

            $table->unsignedInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('no_register_user_name')->nullable()->default(null);
            $table->string('no_register_user_email')->nullable()->default(null);
            $table->string('no_register_user_phone')->nullable()->default(null);

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
        Schema::dropIfExists('orders');
    }
}
