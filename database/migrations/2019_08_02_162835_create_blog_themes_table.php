<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bthemes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alias')->unique();
            $table->string('name_ru')->nullable();
            $table->string('name_ua')->nullable();
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
        Schema::dropIfExists('bthemes');
    }
}
