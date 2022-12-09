<?php

namespace Database\Seeders;

use App\Models\Lot;
use App\Models\Product;
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
        \App\Models\User::factory(1)->create();
        Lot::factory()->count(5)->create();
        Product::factory()->count(100)->create();
    }
}
