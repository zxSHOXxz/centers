<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranierStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranier_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id');
            $table->foreign('trainer_id')->on('trainers')->references('id');
            $table->foreignId('student_id');
            $table->foreign('student_id')->on('students')->references('id');
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
        Schema::dropIfExists('tranier_students');
    }
}
