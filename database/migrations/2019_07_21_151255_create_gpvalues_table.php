<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpvaluesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpvalues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gproduct_id')->unsigned();
            $table->bigInteger('gpparam_id')->unsigned();
            $table->bigInteger('pvalue_id')->unsigned();

            $table->foreign('gproduct_id')->references('id')->on('gproducts')->onDelete('cascade');
            $table->foreign('gpparam_id')->references('id')->on('gpparams')->onDelete('cascade');
            $table->foreign('pvalue_id')->references('id')->on('pvalues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gpvalues');
    }
}
