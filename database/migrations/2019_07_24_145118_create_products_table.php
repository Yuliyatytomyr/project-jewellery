<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('barcode')->unique();
            $table->bigInteger('gproduct_id')->unsigned();
            $table->float('size', 4, 1)->nullable();
            $table->float('weight', 7, 3)->nullable();
            $table->float('g_price', 7, 2)->nullable();
            $table->integer('sale')->default(0);
            $table->float('total_sum', 8, 2)->nullable();
            $table->enum('status', ['new', 'reserve', 'sold'])->default('new');
            $table->text('orderData');
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
        Schema::dropIfExists('products');
    }
}
