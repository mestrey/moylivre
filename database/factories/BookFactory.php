<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->realText(60),
            'user_id' => fake()->boolean() ? User::USER_1_ID : User::USER_2_ID,
            'isbn' => fake()->isbn13(),
            'language' => 'ru',
            'author' => fake()->name(),
            'year' => fake()->boolean(50) ? fake()->year() : null,
            'publisher' => fake()->boolean(50) ? fake()->company() : null,
            'image' => fake()->boolean(50) ? fake()->imageUrl() : null,
            'price' => fake()->boolean(50) ? fake()->numberBetween(0, 800) : null,
        ];
    }
}
