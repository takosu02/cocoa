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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title', 50);
            $table->string('body', 300);
            $table->string('top', 300)->nullable();
            $table->string('jacket', 300)->nullable();
            $table->string('pant', 300)->nullable();
            $table->string('other', 300)->nullable();
            $table->string('image_url');
            $table->timestamps();   //updated_at,created_at
            $table->softDeletes();  //deleted_at
            
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};