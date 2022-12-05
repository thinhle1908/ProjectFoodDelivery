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
            'sku' => 'Camera',
            'image' => 'mayanh.jpg',
            'price' => 123,
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
        DB::table('item')->insert([
            'sku' => 'Hoodie',
            'image' => 'aohoddie.jpg',
            'price' => 123,
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
        DB::table('item')->insert([
            'sku' => 'Lamp',
            'image' => 'denngu.jpg',
            'price' => 123,
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
        DB::table('item')->insert([
            'sku' => 'Sport Shoes',
            'image' => 'giay.jpg',
            'price' => 123,
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
        DB::table('item')->insert([
            'sku' => 'Flycam',
            'image' => 'flycam.jpg',
            'price' => 123,
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
        DB::table('item')->insert([
            'sku' => 'Apple Watch',
            'image' => 'applewatch.jpg',
            'price' => 123,
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
        DB::table('item')->insert([
            'sku' => 'Women clothes',
            'image' => 'aonu.jpg',
            'price' => 123,
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
        DB::table('item')->insert([
            'sku' => 'Lifeline Skin',
            'image' => 'suaruamat.jpg',
            'price' => 123,
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
