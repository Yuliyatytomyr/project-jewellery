<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpimages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gproduct_id')->unsigned();
            $table->longText('image_path');
            $table->timestamps();

            $table->foreign('gproduct_id')->references('id')->on('gproducts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gpimages');
    }
}
