<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('description')->nullable();
            $table->time('date');
            $table->enum('status',['import','export']);
            $table->string('employee')->nullable();
            $table->enum('connection_type',['FB','ins','tw','wa','ap']);
            $table->enum('replay',['ap','af','ad','aj','ads','ak','hs','hm']);
            $table->date('replay_date');
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
        Schema::dropIfExists('connections');
    }
}
