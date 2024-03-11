<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\ProductInventory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Product::factory(30)->create();
        // for($i = 1; $i <= 30; $i++){
        //     for($j = 39; $j <= 43; $j++){
        //         ProductInventory::create([
        //             'product_id' => $i,
        //             'size' => $j,
        //             'quantity' => random_int(3, 10),
        //         ]);
        //     }
        // }   
    }
}
