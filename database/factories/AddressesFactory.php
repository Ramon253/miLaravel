<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Addresses>
 */
class AddressesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'postal_code' => fake()->numberBetween(10000, 99999),
            'street' => fake()->streetName(),
            'number' => fake()->address(),
            'id_user' => fake()->randomElement(Users::all())['id']
        ];
    }
}
