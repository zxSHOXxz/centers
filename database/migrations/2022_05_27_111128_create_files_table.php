<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('outlienes')->nullable();
            $table->string('materials')->nullable();
            $table->foreignId('diploma_id')->nullable();
            $table->foreign('diploma_id')->on('diplomas')->references('id')->nullable();
            $table->foreignId('course_id');
            $table->foreign('course_id')->on('courses')->references('id')->nullable();
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
        Schema::dropIfExists('files');
    }
}
