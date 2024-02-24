<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->boolean() ? fake()->sentence() : null,
            'user_id' => fake()->boolean() ? User::USER_1_ID : User::USER_2_ID,
            'public' => fake()->boolean(),
        ];
    }
}
