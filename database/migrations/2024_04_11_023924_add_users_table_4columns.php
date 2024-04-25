<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //mypageに必要な項目を追加
            $table->string('body', 500)->nullable();
            $table->string('age', 2)->nullable();
            $table->string('height', 3)->nullable();
            $table->string('image_url')->nullable();
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
            $table->dropColumn('body', 500)->nullable();
            $table->dropColumn('age', 2);
            $table->dropColumn('height', 3);
            $table->dropColumn('image_url');
        });
    }
};
