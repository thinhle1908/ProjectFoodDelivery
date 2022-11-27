<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'firstname' => 'thinh',
            'lastname'=>'le',
            'email'=>'thinhuser@gmail.com',
            'password'=>Hash::make('123456')
        ]);
        DB::table('user')->insert([
            'firstname' => 'thinh',
            'lastname'=>'le',
            'email'=>'thinhsaler@gmail.com',
            'password'=>Hash::make('123456')
        ]);
        DB::table('user')->insert([
            'firstname' => 'thinh',
            'lastname'=>'le',
            'email'=>'thinhadmin@gmail.com',
            'password'=>Hash::make('123456')
        ]);
    }
}
