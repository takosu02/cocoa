<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'たこやき',
            'email'=>'i@gmail.com',
            'password'=>'aiueo',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('users')->insert([
            'id' => '2',
            'name' => 'たこす',
            'email'=>'a@gmail.com',
            'password'=>'kakikukeko',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
    }
}
