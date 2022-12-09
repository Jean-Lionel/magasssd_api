<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Lot;
use App\Models\Product;

class LotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'product_id' => Product::factory(),
            'quantity' => $this->faker->randomFloat(0, 0, 50),
            'price_unitaire' => $this->faker->randomFloat(0, 0, 50),
            'price_vente' => $this->faker->randomFloat(0, 0, 50),
            'date_created' => $this->faker->dateTime(),
            'description' => $this->faker->text,
        ];
    }
}
