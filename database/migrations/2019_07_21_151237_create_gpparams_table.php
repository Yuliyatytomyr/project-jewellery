<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpparamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpparams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('param_id')->unsigned();
            $table->bigInteger('gproduct_id')->unsigned();

            $table->foreign('param_id')->references('id')->on('params')->onDelete('cascade');
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
        Schema::dropIfExists('gpparams');
    }
}
