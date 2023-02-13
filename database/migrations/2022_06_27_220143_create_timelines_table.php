<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->string('days')->nullable();
            $table->string('time')->nullable();
            $table->string('period')->nullable();
            $table->string('status')->nullable();
            // $table->foreignId('group_id');
            // $table->foreign('group_id')->on('groubs')->references('id');
            // $table->foreignId('room_id');
            // $table->foreign('room_id')->on('rooms')->references('id');
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
        Schema::dropIfExists('timelines');
    }
}
