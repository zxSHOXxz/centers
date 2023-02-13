<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile1');
            $table->string('mobile2');
            $table->string('another_mobile')->nullable();
            $table->string('another_name')->nullable();
            $table->string('spciality')->nullable();
            $table->enum('employee',['yes','no']);
            $table->date('date_of_birth');
            $table->enum('qualification',['a','b','c','d'])->nullable();
            $table->string("work_place")->nullable();
            $table->string("access_method")->nullable();
            $table->enum("status",['active', 'blackList','finished']);
            $table->string('specialities_id');
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreignId('group_id');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreignId('diploma_id');
            $table->foreign('diploma_id')->references('id')->on('diplomas');
            $table->foreignId('finance_id')->nullable();
            $table->foreign('finance_id')->references('id')->on('finances');

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
        Schema::dropIfExists('students');
    }
}
