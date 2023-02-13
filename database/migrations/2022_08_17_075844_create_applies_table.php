<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->id();
            $table->enum("day",['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ar');
            $table->enum("spciality",['ap','af','ad', 'aj', 'ads', 'ak']);
            $table->string('address');
            $table->string('email');
            $table->string('mobile1');
            $table->enum("name_topic",['suggestion','complaint','show_case', 'Other']);
            $table->string('topic');
            $table->enum("status",['active','blackList','finished'])->nullable();
            $table->foreignId('employee_id')->nullable();
            $table->foreign('employee_id')->on('employees')->references('id');
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
        Schema::dropIfExists('applies');
    }
}