<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'id' => User::ADMIN_ID,
                'last' => 'Admin',
                'first' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'role_id' => Role::ADMIN_ID,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
