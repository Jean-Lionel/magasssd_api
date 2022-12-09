<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;
use App\Models\Client;
use App\Models\TypeClient;
use App\Models\User;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address_id' => Address::factory(),
            'type_client_id' => TypeClient::factory(),
            'nom' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'prenom' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'description' => $this->faker->text,
            'telephone' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'nif' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'assujet_tva' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'user_id' => User::factory(),
            'softdeletes' => $this->faker->word,
        ];
    }
}
