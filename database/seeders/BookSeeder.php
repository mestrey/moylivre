<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Collection;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::factory()
            ->count(10)
            ->create();

        Book::all()->each(function (Book $book) {
            if (fake()->boolean(75)) {
                $book->genres()->attach(fake()->boolean()
                    ? [fake()->numberBetween(1, 6)]
                    : [fake()->numberBetween(1, 6), fake()->numberBetween(7, Genre::count())]);
            }

            $book->collections()->attach(
                fake()->boolean()
                    ? Collection::where('user_id', $book->user->id)->get()->random(1)->pluck('id')
                    : Collection::where('user_id', $book->user->id)->get()->pluck('id')
            );
        });
    }
}
