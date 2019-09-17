<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('notify_email', ['0', '1'])->after('surname')->default('0');
            $table->enum('notify_phone', ['0', '1'])->after('surname')->default('0');
            $table->enum('type', ['male', 'famale'])->after('surname')->nullable();
            $table->string('discount')->after('surname')->nullable();
            $table->string('town')->after('surname')->nullable();
            $table->date('birth_at')->after('surname')->nullable();
            $table->string('photo')->after('surname')->nullable();
            $table->string('phone')->after('surname')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'photo', 'birth_at', 'town', 'type']);
        });
    }
}
