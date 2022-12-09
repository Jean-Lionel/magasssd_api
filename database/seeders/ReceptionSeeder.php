<?php

namespace Database\Seeders;

use App\Models\Reception;
use Illuminate\Database\Seeder;

class ReceptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reception::factory()->count(5)->create();
    }
}
