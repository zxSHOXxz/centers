<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_timelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->nullable();
            $table->foreign('room_id')->on('rooms')->references('id');
            $table->foreignId('timeline_id')->nullable();
            $table->foreign('timeline_id')->on('timelines')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_timelines');
    }
}
