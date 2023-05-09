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
        Schema::create('room_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('team_id')->nullable();
            $table->string('name')->nullable();
            $table->unsignedInteger('added_by')->nullable();
            $table->text('description')->nullable();
            $table->string('size')->nullable();
            $table->string('bed_type')->nullable();
            $table->integer('num_beds')->nullable();
            $table->float('price', 9, 2)->nullable();
            $table->string('per')->nullable();
            $table->string('cover')->nullable();
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
        Schema::dropIfExists('room_types');
    }
};
