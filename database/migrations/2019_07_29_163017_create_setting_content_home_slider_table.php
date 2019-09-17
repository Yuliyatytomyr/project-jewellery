<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingContentHomeSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_home_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alt');
            $table->string('link');
            $table->longText('image_thumb');
            $table->longText('image_full');
            $table->boolean('show_on');
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
        Schema::dropIfExists('content_home_sliders');
    }
}
