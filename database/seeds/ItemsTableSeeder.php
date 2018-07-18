<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('items')->insert([
        [
          'name' => 'アイスコーヒーS',
          'price' => '140',
          'shop_id' => '1', 
        ],
        [
          'name' => 'アイスコーヒーM',
          'price' => '180',
          'shop_id' => '1', 
        ],
        [
          'name' => 'アイスコーヒーL',
          'price' => '220',
          'shop_id' => '1', 
        ],
        [
          'name' => 'ホットコーヒーS',
          'price' => '130',
          'shop_id' => '1', 
        ],
        [
          'name' => 'ホットコーヒーM',
          'price' => '170',
          'shop_id' => '1', 
        ],
        [
          'name' => 'ホットコーヒーL',
          'price' => '210',
          'shop_id' => '1', 
        ],
        [
          'name' => 'アイスコーヒーS',
          'price' => '140',
          'shop_id' => '2', 
        ],
        [
          'name' => 'アイスコーヒーM',
          'price' => '180',
          'shop_id' => '2', 
        ],
        [
          'name' => 'アイスコーヒーL',
          'price' => '220',
          'shop_id' => '2', 
        ],
        [
          'name' => 'ホットコーヒーS',
          'price' => '130',
          'shop_id' => '2', 
        ],
        [
          'name' => 'ホットコーヒーM',
          'price' => '170',
          'shop_id' => '2', 
        ],
        [
          'name' => 'ホットコーヒーL',
          'price' => '210',
          'shop_id' => '2', 
        ]
    ]);
    
    }
}
