<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogThemesPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('btposts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('btheme_id')->unsigned();
            $table->string('alias')->unique();
            $table->string('title_ru');
            $table->string('title_ua');
            $table->longText('s_desc_ru');
            $table->longText('s_desc_ua');
            $table->longText('image_path');
            $table->longText('content_ru')->nullable();
            $table->longText('content_ua')->nullable();
            $table->boolean('show_on');
            $table->timestamps();

            $table->foreign('btheme_id')->references('id')->on('bthemes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('btposts');
    }
}
