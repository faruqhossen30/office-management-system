<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_lists', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->string('expense_type');
            $table->string('description');
            $table->bigInteger('voucher_no');
            $table->bigInteger('amount');
            $table->string('payment_type');
            $table->string('remarks');
            $table->unsignedBigInteger('office_id');
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
        Schema::dropIfExists('expense_lists');
    }
}
