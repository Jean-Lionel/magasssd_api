<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Reception;
use App\Models\Stock;
use App\Models\User;

class ReceptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reception::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'montant' => $this->faker->randomFloat(0, 0, 9999999999.),
            'montant_total' => $this->faker->randomFloat(0, 0, 9999999999.),
            'tva' => $this->faker->randomFloat(0, 0, 9999999999.),
            'description' => $this->faker->text,
            'user_id' => User::factory(),
            'stock_id' => Stock::factory(),
           
        ];
    }
}
