<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->unsignedBigInteger('payment_system_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('bank_id');
            $table->string('phone');
            $table->string('transaction');
            $table->string('source');
            $table->timestamp('date');
            $table->string('remarks');
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
        Schema::dropIfExists('deposits');
    }
}
