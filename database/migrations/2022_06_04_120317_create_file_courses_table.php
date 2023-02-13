<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_courses', function (Blueprint $table) {
            $table->id();
            $table->string('fileName')->nullable();
            $table->string('file')->nullable();
            $table->foreignId('course_id');
            $table->foreign('course_id')->on('courses')->references('id')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('file_courses');
    }
}
