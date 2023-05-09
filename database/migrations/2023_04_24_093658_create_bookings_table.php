<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('guests_id')->nullable();
            $table->unsignedInteger('rooms_id')->nullable();
            $table->unsignedInteger('reservations_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreignId('team_id')->nullable();
            $table->string('booking_code')->nullable();
            $table->string('checkin_date')->nullable();
            $table->string('checkout_date')->nullable();
            $table->integer('num_adults')->nullable();
            $table->integer('num_children')->nullable();
            $table->string('booking_date')->nullable();
            $table->float('total_price', 9, 2)->nullable();
            $table->integer('payment_status')->default(0);
            $table->integer('booking_status')->default(1);
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
