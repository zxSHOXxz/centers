<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileDiplomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_diplomas', function (Blueprint $table) {
            $table->id();
            $table->string('fileName')->nullable();
            $table->string('file')->nullable();
            $table->foreignId('diploma_id')->nullable();
            $table->foreign('diploma_id')->on('diplomas')->references('id')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('file_diplomas');
    }
}
