<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'id' => User::ADMIN_ID, 'last' => 'Admin', 'first' => 'Admin',
            'latitude' => User::MOSCOW_LAT, 'longitude' => User::MOSCOW_LON,
            'email' => 'admin@admin.com', 'password' => bcrypt('admin')
        ]);

        $admin->roles()->attach(Role::ADMIN->value);

        $user1 = User::create([
            'id' => User::USER_1_ID, 'last' => 'User1', 'first' => 'User1',
            'latitude' => User::MOSCOW_LAT, 'longitude' => User::MOSCOW_LON,
            'email' => 'user1@user.com', 'password' => bcrypt('user1')
        ]);

        $user2 = User::create([
            'id' => User::USER_2_ID, 'last' => 'User2', 'first' => 'User2',
            'latitude' => User::ST_PETERSBURG_LAT, 'longitude' => User::ST_PETERSBURG_LON,
            'email' => 'user2@user.com', 'password' => bcrypt('user2')
        ]);

        $user1->roles()->attach(Role::USER->value);
        $user2->roles()->attach(Role::USER->value);
    }
}
