<?php

namespace Database\Seeders;

use App\Enums\Genre as GenreEnum;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSender extends Seeder
{
    public function run(): void
    {
        Genre::insert(array_map(
            fn ($genre) => [
                'id' => $genre->value,
                'name' => $genre->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            GenreEnum::cases()
        ));
    }
}
