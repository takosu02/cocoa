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
        Schema::create('category_post', function (Blueprint $table) {
            //category_idとpost_idを外部キーに設定
            $table->foreignId('category_id')->constrained('categories');  
            $table->foreignId('post_id')->cinstrained('posts');
            $table->primary(['category_id', 'post_id']);
            //多対多のリレーション
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_post');
    }
};
