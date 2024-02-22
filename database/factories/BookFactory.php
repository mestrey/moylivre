<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6, true),
            'isbn' => fake()->isbn13(),
            'language' => 'ru',
            'author' => fake()->name(),
        ];
    }
}
