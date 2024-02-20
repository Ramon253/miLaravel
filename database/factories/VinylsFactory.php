<?php

namespace Database\Factories;

use App\Models\Songs;
use App\Models\Vinyls;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VinylsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'stock' => fake()->numberBetween(0,1000),
            'price' => fake()->numberBetween(1, 150),
            'imageStyle' => fake()->image(),
            'maxDuration' => 44,
            'duration' => fake()->numberBetween(1,44)
        ];
    }

}
