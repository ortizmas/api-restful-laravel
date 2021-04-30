<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'cep' => $this->faker->postcode(),
            'street' => $this->faker->streetAddress,
            'number' => $this->faker->randomNumber,
            'district' => $this->faker->text(100),
            'user_id' => rand(1, User::count()),
            'city_id' => rand(1, City::count()),
            'state_id' => rand(1, State::count())
        ];
    }
}
