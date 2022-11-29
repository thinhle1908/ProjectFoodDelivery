<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item')->insert([
            'sku' => 'test',
            'image' => 'test.png',
            'price' => 5000,
            'sale_price' => 250,
            'quantity' => 5,
            'sold' => 10,
            'created_by' => 2,
            'updated_by' => 2,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'product_id' => 5,
            'discount_id' => 1,

        ]);
    }
}
