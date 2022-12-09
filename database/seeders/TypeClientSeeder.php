<?php

namespace Database\Seeders;

use App\Models\TypeClient;
use Illuminate\Database\Seeder;

class TypeClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeClient::factory()->count(5)->create();
    }
}
