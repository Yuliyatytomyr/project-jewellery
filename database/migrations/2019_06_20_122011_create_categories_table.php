<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alias')->unique();
            $table->string('name_ru')->nullable();
            $table->string('name_ua')->nullable();
            $table->longText('image_thumb')->nullable();
            $table->longText('image_full')->nullable();
            $table->longText('desc_ru')->nullable();
            $table->longText('desc_ua')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
