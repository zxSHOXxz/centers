<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_number');
            $table->string('group_name');
            $table->enum('dayes' , ['سبت - اثنين - أربعاء' , 'أحد - ثلاثاء - خميس']);
            // $table->boolean('dayes')->default(true);

            $table->foreignId('diploma_id');
            $table->foreign('diploma_id')->on('diplomas')->references('id');
            $table->foreignId('room_id');
            $table->foreign('room_id')->on('rooms')->references('id');
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
        Schema::dropIfExists('groups');
    }
}
