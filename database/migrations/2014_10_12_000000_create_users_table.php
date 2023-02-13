<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->date('date_of_birth');
            $table->enum('salary_type' , ['راتب ثابت' , 'راتب بالساعة']);
            $table->string('salary_value')->nullable();
            $table->string('speciality')->nullable();
            $table->enum('job_title' , ['مشرف' , 'مدرب' , 'استقبال' , 'إداري']);
            $table->enum('certification' , ['دبلوم' , 'بكالوريس' , 'ماستر' , 'بدون']);
            $table->foreignId('city_id');
            $table->foreign('city_id')->on('cities')->references('id');
            $table->morphs('actor');
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
        Schema::dropIfExists('users');
    }
}
