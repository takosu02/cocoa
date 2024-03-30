<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::factory()->count(10)->create();
        
        DB::table('posts')->insert([
            'id' => '11',
            'user_id' =>'1',
            'title' => 'パーカー',
            'body'=>'あ',
            'top'=>'a',
            'jacket'=>'a',
            'pant'=>'a',
            'other'=>'a',
            'image_url'=>'a',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
            DB::table('posts')->insert([
            'id' => '12',
            'user_id' =>'2',
            'title' => 'あいうえお',
            'body'=>'あ',
            'top'=>'a',
            'jacket'=>'a',
            'pant'=>'a',
            'other'=>'a',
            'image_url'=>'a',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
