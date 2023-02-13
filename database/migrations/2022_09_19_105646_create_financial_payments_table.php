<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('order_number');
            $table->string('mobile1');
            $table->string('mobile2');
            $table->date('date_registration');
            $table->integer('price');
            $table->string('pay');
            $table->enum('payment_method',['كاش','دفع']);
            $table->string('date_week');
            $table->text('notes');
            $table->foreignId('group_id')->nullable();
            $table->foreign('group_id')->on('groups')->references('id');
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
        Schema::dropIfExists('financial_payments');
    }
}
