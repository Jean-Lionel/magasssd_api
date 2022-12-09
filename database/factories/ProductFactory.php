<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'unite_mesure' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'caisse' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'nombre_bouteille' => $this->faker->randomFloat(0, 0, 50),
            'user_id' => User::factory(),
        ];
    }
}
