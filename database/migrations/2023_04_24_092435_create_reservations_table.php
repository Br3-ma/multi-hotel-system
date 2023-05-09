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
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('guests_id')->nullable();
            $table->unsignedInteger('rooms_id')->nullable();
            $table->foreignId('team_id')->nullable();
            $table->string('room_type')->nullable();    
            $table->string('reservation_code')->nullable();
            $table->string('reservation_date')->nullable();
            $table->string('checkin_date')->nullable();
            $table->string('checkout_date')->nullable();
            $table->integer('num_adults')->nullable();
            $table->integer('num_children')->nullable();
            $table->text('special_requests')->nullable();
            $table->integer('is_confirmed')->default(0);
            $table->string('confirmation_date')->nullable();
            $table->string('cancellation_date')->nullable();
            $table->integer('is_cancelled')->default(0);
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('reservations');
    }
};
