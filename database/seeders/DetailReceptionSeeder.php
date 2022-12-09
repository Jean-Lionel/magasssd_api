<?php

namespace Database\Seeders;

use App\Models\DetailReception;
use Illuminate\Database\Seeder;

class DetailReceptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailReception::factory()->count(5)->create();
    }
}
