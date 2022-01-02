<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('permitted_by');
            $table->string('loan_details');
            $table->dateTime('approve_date');
            $table->dateTime('apply_date');
            $table->dateTime('repayment_from');
            $table->integer('installment_period');
            $table->integer('amount');
            $table->integer('Installment');
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
        Schema::dropIfExists('lones');
    }
}
