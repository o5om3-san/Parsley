<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('shops')->insert([
       
        [
          'name' => '9F 楽天カフェ',
          'address' => 'Crimson House 9F',
        ],
        
        [
          'name' => '22F 楽天カフェ',
          'address' => 'Crimson House 22F',
        ]
    ]);
        
    }
}