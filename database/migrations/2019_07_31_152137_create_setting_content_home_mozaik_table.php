<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingContentHomeMozaikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_home_mozaiks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alt');
            $table->string('link');
            $table->string('name_ru');
            $table->string('name_ua');
            $table->longText('image_thumb');
            $table->longText('image_full')->nullable();
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
        Schema::dropIfExists('content_home_mozaiks');
    }
}
