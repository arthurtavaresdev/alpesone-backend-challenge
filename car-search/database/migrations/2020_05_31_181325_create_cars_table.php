<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->string('sku')->primary();
            $table->timestamps();
            $table->string('name');
            $table->string('url');
            $table->string('image');
            $table->string('bodyType');
            $table->string('brand');
            $table->string('model');
            $table->text('description');
            $table->string('mileage');
            $table->string('color');
            $table->float('price');
            $table->string('priceCurrency');
            $table->string('modelDate');
            $table->string('fuelType');
            $table->integer('doors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
