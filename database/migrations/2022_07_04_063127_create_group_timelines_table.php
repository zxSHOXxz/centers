<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_timelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->nullable();
            $table->foreign('group_id')->on('groubs')->references('id');
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
        Schema::dropIfExists('group_timelines');
    }
}
