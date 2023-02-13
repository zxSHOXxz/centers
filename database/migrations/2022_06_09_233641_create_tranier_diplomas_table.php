<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranierDiplomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranier_diplomas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id');
            $table->foreign('trainer_id')->on('trainers')->references('id');
            $table->foreignId('diploma_id');
            $table->foreign('diploma_id')->on('diplomas')->references('id');
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
        Schema::dropIfExists('tranier_diplomas');
    }
}
