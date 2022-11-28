<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Variation_OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variation_option')->insert([
            'value' => 'black',
            'variation_id'=>1,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'green',
            'variation_id'=>1,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'blue',
            'variation_id'=>1,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'white',
            'variation_id'=>1,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'black',
            'variation_id'=>2,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'green',
            'variation_id'=>2,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'blue',
            'variation_id'=>2,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'white',
            'variation_id'=>2,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'black',
            'variation_id'=>3,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'green',
            'variation_id'=>3,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'blue',
            'variation_id'=>3,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'white',
            'variation_id'=>3,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'black',
            'variation_id'=>4,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'green',
            'variation_id'=>4,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'blue',
            'variation_id'=>4,
        ]);
        DB::table('variation_option')->insert([
            'value' => 'white',
            'variation_id'=>4,
        ]);
    }
}
