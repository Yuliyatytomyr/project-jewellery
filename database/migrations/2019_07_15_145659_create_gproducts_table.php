<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alias')->unique();
            $table->string('item_code')->unique();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('subcategory_id')->unsigned();
            $table->string('name_ru')->nullable();
            $table->string('name_ua')->nullable();
            $table->longText('desc_ru')->nullable();
            $table->longText('desc_ua')->nullable();
            $table->boolean('new_on');
            $table->boolean('topsale_on');
            $table->boolean('sprice_on');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gproducts');
    }
}
