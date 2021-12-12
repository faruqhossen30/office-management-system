<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('phone_alt');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->integer('zip_code');
            $table->string('gender');
            $table->string('nid_no');
            $table->dateTime('date_of_birth');
            $table->string('covid_vaccine');
            $table->dateTime('join_date');
            $table->string('photo');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('description');
            $table->string('marital_status');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('office_id')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
