<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DiscountGroupValue>
 */
class DiscountGroupValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'percent' => fake()->randomDigit(1, 25),
            'amount' => fake()->randomDigit(100, 20000)
        ];
    }
}
