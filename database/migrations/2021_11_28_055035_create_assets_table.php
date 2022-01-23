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
            $table->string('sub_asset')->nullable();
            $table->unsignedBigInteger('assettype_id');
            $table->integer('price');
            $table->dateTime('buy_date');
            $table->dateTime('expiry_date');
            $table->string('warranty_date');
            $table->string('serial');
            $table->string('additional_information');
            $table->string('remarks');
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
