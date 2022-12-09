<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DetailReception;
use App\Models\Lot;
use App\Models\Product;
use App\Models\Reception;
use App\Models\User;

class DetailReceptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailReception::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lot_id' => Lot::factory(),
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->randomFloat(0, 0, 9999999999.),
            'prix_unitaire' => $this->faker->randomFloat(0, 0, 9999999999.),
            'reception_id' => Reception::factory(),

        ];
    }
}
