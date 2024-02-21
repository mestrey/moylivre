<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            ['id' => Role::ADMIN_ID, 'name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Role::USER_ID, 'name' => 'user', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
