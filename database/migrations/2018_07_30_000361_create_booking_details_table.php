<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->integer('persons_amount');

            $table->unsignedInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('bookings');

            $table->unsignedInteger('row_id')->comment('The object model that is being booked.');
            $table->foreign('row_id')->references('id')->on('rows');

            $table->unsignedInteger('payment_method_id');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');

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
        Schema::dropIfExists('booking_details');
    }
}
