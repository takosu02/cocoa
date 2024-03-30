<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => '1',
            'name' => 'Tシャツ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('categories')->insert([
            'id' => '2',
            'name' => 'シャツ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('categories')->insert([
            'id' => '3',
            'name' => 'ニット',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('categories')->insert([
            'id' => '4',
            'name' => 'パーカー',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('categories')->insert([
            'id' => '5',
            'name' => 'カーディガン',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('categories')->insert([
            'id' => '6',
            'name' => 'ベスト',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('categories')->insert([
            'id' => '7',
            'name' => 'スウェット',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('categories')->insert([
            'id' => '8',
            'name' => 'コート',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('categories')->insert([
            'id' => '9',
            'name' => 'ワンピース',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('categories')->insert([
            'id' => '10',
            'name' => 'スカート',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
    
}
