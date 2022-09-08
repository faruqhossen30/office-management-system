<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->dateTime('month');
            $table->dateTime('payment_date');
            $table->integer('basic_salary');
            $table->integer('house_allowance');
            $table->integer('medical_allowance');
            $table->integer('conveyance_allowance');
            $table->integer('other_allowance');
            $table->integer('gross_salary');
            $table->integer('total_advance');
            $table->integer('Installment')->default(0);
            $table->integer('other_deduction')->nullable();
            $table->string('deduction_detail')->nullable();
            $table->integer('totalsalary');
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
        Schema::dropIfExists('salaries');
    }
}
