<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('the_visits', function (Blueprint $table) {
            $table->id();
            $table->string('number_visit');
            $table->text('description')->nullable();
            $table->foreignId('vistor_id')->nullable();
            $table->foreign('vistor_id')->on('vistors')->references('id');
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
        Schema::dropIfExists('the_visits');
    }
}
