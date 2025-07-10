<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(rand(3, 6)),

            'author' => fake()->name(),

            'publication_year' => fake()->year(),

            'publisher' => fake()->company(),
        ];
    }
}
