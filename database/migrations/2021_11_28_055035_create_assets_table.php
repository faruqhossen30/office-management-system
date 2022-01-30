<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('subasset_id')->nullable();
            $table->unsignedBigInteger('assettype_id');
            $table->integer('price');
            $table->dateTime('buy_date');
            $table->dateTime('expiry_date');
            $table->string('warranty_date');
            $table->string('serial')->nullable();
            $table->string('additional_information')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('author_id');
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
        Schema::dropIfExists('assets');
    }
}
