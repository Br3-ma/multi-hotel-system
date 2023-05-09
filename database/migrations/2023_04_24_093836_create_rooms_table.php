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
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('team_id')->nullable();
            $table->integer('room_number')->nullable();
            $table->unsignedInteger('room_types_id')->nullable();
            $table->unsignedInteger('modified_by')->nullable();
            $table->integer('num_adult')->nullable();
            $table->integer('num_children')->nullable();
            $table->string('bed_type')->nullable();
            $table->integer('occupancy')->nullable();
            $table->integer('is_available')->nullable();
            $table->string('image_path')->nullable();
            $table->float('price', 9,2)->nullable();
            $table->string('floor')->nullable();
            $table->text('special_offers')->nullable();
            $table->integer('num_beds')->nullable();
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
        Schema::dropIfExists('rooms');
    }
};
