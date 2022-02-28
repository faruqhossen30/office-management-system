<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

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
            $table->integer('amount');
            $table->unsignedBigInteger('expense_id');
            $table->unsignedBigInteger('sub_expense_type_id')->Unique()->nullable();
            $table->string('voucher_no')->nullable();
            $table->unsignedBigInteger('payment_system_id');
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('transaction')->nullable();
            $table->timestamp('date');
            $table->string('description', 1000)->nullable();
            $table->string('remarks')->nullable();
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
