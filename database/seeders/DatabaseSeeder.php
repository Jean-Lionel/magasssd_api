<?php

namespace Database\Seeders;

use App\Models\Lot;
use App\Models\Type;
use App\Models\Stock;
use App\Models\Address;
use App\Models\Product;
use App\Models\Reception;
use App\Models\TypeClient;
use App\Models\DetailReception;
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
        Product::factory()->count(50)->create();
        Address::factory()->count(5)->create();
        DetailReception::factory()->count(5)->create();
        Reception::factory()->count(5)->create();
        Stock::factory()->count(5)->create();
        TypeClient::factory()->count(5)->create();
        Type::factory()->count(5)->create();
    }
}
