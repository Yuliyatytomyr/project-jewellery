<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PeriodProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('period_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku');
            $table->string('sku_option');
            $table->string('name');
            $table->string('razmer');
            $table->string('ves');
            $table->string('price');
            $table->string('discount');
            $table->string('special_price');
            $table->string('description');
            $table->string('description_ua');
            $table->string('brand_new');
            $table->string('weight');
            $table->string('probe');
            $table->string('amountKamny')->nullable();
            $table->string('weightKamny')->nullable();
            $table->string('formOgranky')->nullable();
            $table->string('GrColor')->nullable();
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
        //
    }
}
