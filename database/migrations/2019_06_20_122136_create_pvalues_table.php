<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePvaluesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pvalues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('param_id')->unsigned();
            $table->string('type_value')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_ua')->nullable();
            $table->longText('desc')->nullable();
            $table->timestamps();

            $table->foreign('param_id')->references('id')->on('params')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pvalues');
    }
}
