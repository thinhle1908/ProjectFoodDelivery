<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class
        ]);
        $this->call([
            UserSeeder::class
        ]);
        $this->call([
            User_RoleSeeder::class
        ]);
        $this->call([
            CategorySeeder::class
        ]);
        $this->call([
            VariationSeeder::class
        ]);
        $this->call([
            DiscountSeeder::class
        ]);
        $this->call([
            OrderStatus::class
        ]);
        
    }
}
