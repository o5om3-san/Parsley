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
          'shop_name' => 'CH_9F_ConvenienceStore',
          'address' => 'Crimson House 9F',
        ],
        [
          'shop_name' => 'CH_22F_ConvenienceStore',
          'address' => 'Crimson House 22F',
        ],
        [
          'shop_name' => 'CH_9F_RakutenCafe',
          'address' => 'Crimson House 9F',
        ],
        [
          'shop_name' => 'CH_22F_RakutenCafe',
          'address' => 'Crimson House 22F',
        ],
      ]);
    }
}
