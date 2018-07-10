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
          'name' => 'Coffee S / Iced',
          'price' => '140',
          'shop_id' => '1', 
        ],
        [
          'name' => 'Coffee M / Iced',
          'price' => '180',
          'shop_id' => '1', 
        ],
        [
          'name' => 'Coffee L / Iced',
          'price' => '220',
          'shop_id' => '1', 
        ],
        [
          'name' => 'Coffee S / Hot',
          'price' => '130',
          'shop_id' => '1', 
        ],
        [
          'name' => 'Coffee M / Hot',
          'price' => '170',
          'shop_id' => '1', 
        ],
        [
          'name' => 'Coffee L / Hot',
          'price' => '210',
          'shop_id' => '1', 
        ],
        [
          'name' => 'Coffee S / Iced',
          'price' => '140',
          'shop_id' => '2', 
        ],
        [
          'name' => 'Coffee M / Iced',
          'price' => '180',
          'shop_id' => '2', 
        ],
        [
          'name' => 'Coffee L / Iced',
          'price' => '220',
          'shop_id' => '2', 
        ],
        [
          'name' => 'Coffee S / Hot',
          'price' => '130',
          'shop_id' => '2', 
        ],
        [
          'name' => 'Coffee M / Hot',
          'price' => '170',
          'shop_id' => '2', 
        ],
        [
          'name' => 'Coffee L / Hot',
          'price' => '210',
          'shop_id' => '2', 
        ],
        [
          'name' => 'Coffee S / Iced',
          'price' => '140',
          'shop_id' => '3', 
        ],
        [
          'name' => 'Coffee M / Iced',
          'price' => '180',
          'shop_id' => '3', 
        ],
        [
          'name' => 'Coffee L / Iced',
          'price' => '220',
          'shop_id' => '3', 
        ],
        [
          'name' => 'Coffee S / Hot',
          'price' => '130',
          'shop_id' => '3', 
        ],
        [
          'name' => 'Coffee M / Hot',
          'price' => '170',
          'shop_id' => '3', 
        ],
        [
          'name' => 'Coffee L / Hot',
          'price' => '210',
          'shop_id' => '3', 
        ],
        [
          'name' => 'Coffee S / Iced',
          'price' => '140',
          'shop_id' => '4', 
        ],
        [
          'name' => 'Coffee M / Iced',
          'price' => '180',
          'shop_id' => '4', 
        ],
        [
          'name' => 'Coffee L / Iced',
          'price' => '220',
          'shop_id' => '4', 
        ],
        [
          'name' => 'Coffee S / Hot',
          'price' => '130',
          'shop_id' => '4', 
        ],
        [
          'name' => 'Coffee M / Hot',
          'price' => '170',
          'shop_id' => '4', 
        ],
        [
          'name' => 'Coffee L / Hot',
          'price' => '210',
          'shop_id' => '4', 
        ]
        ]);
    }
}
