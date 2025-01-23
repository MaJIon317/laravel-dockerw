<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Information>
 */
class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => null,
            'meta_title' => fake()->title(),
            'meta_description' => fake()->text(),
            'meta_keywords' => fake()->title(),
            'slug' => fake()->slug(),
            'status' => 1,
        ];
    }
}
