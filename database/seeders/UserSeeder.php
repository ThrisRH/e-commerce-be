<?php

namespace Database\Seeders;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Enums\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles if not exists
        foreach (UserRole::cases() as $role) {
            Role::firstOrCreate(['name' => $role->value, 'guard_name' => 'api']);
        }

        // Create Admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'phone_number' => '0123456789',
            ]
        );

        $admin->assignRole(UserRole::Admin->value);

        // Create a test Customer user
        $customer = User::firstOrCreate(
            ['email' => 'customer@test.com'],
            [
                'name' => 'Test Customer',
                'password' => Hash::make('password'),
                'phone_number' => '0987654321',
            ]
        );

        $customer->assignRole(UserRole::Customer->value);
    }
}
