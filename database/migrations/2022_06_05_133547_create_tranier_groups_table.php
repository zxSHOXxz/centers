<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranierGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranier_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id');
            $table->foreign('trainer_id')->on('trainers')->references('id');
            $table->foreignId('group_id');
            $table->foreign('group_id')->on('groups')->references('id');
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
        Schema::dropIfExists('tranier_groups');
    }
}
