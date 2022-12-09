<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;
use App\Models\User;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'pays' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'province' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'commune' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'zone' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'colline' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'user_id' => User::factory(),
            'softdeletes' => $this->faker->word,
        ];
    }
}
