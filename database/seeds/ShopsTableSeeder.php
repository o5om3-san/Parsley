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
          'name' => 'CH_9F_ConvenienceStore',
          'address' => 'Crimson House 9F',
        ],
        
        [
          'name' => 'CH_22F_ConvenienceStore',
          'address' => 'Crimson House 22F',
        ],
        
        [
          'name' => 'CH_9F_RakutenCafe',
          'address' => 'Crimson House 9F',
        ],
        
        [
          'name' => 'CH_22F_RakutenCafe',
          'address' => 'Crimson House 22F',
        ]
        ]);
        

    }
}