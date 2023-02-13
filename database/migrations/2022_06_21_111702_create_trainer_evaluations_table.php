<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainerEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_evaluations', function (Blueprint $table) {
            $table->id();
            $table->float('mid_exam')->nullable();
            $table->float('activity')->nullable();
            $table->float('project')->nullable();
            $table->float('fina_exam')->nullable();
            $table->float('total')->nullable();
            $table->foreignId('trainer_id');
            $table->foreign('trainer_id')->on('trainers')->references('id');
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
        Schema::dropIfExists('trainer_evaluations');
    }
}
