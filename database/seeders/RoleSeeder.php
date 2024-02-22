<?php

namespace Database\Seeders;

use App\Enums\Role as RoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            ['id' => RoleEnum::ADMIN, 'name' => RoleEnum::ADMIN->name(), 'created_at' => now(), 'updated_at' => now()],
            ['id' => RoleEnum::USER, 'name' => RoleEnum::USER->name(), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
