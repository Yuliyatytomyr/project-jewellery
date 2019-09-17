<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('params', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('special');
            $table->boolean('update_on')->default(1);
            $table->string('type_param')->nullable();
            $table->string('type_value')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_ua')->nullable();
            $table->longText('desc')->nullable();
            $table->timestamps();
        });

        Schema::create('subcategories_params', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subcategory_id')->unsigned();
            $table->bigInteger('param_id')->unsigned();
            $table->timestamps();

            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
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
        Schema::dropIfExists(['params', 'subcategories_params']);
    }
}
