<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users with specific roles using the Role enum

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => Role::admin->value, // Assign Admin role
        ]);

        User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => bcrypt('password'),
            'role' => Role::customer->value, // Assign Customer role
        ]);

        User::factory()->create([
            'name' => 'Supplier',
            'email' => 'supplier@example.com',
            'password' => bcrypt('password'),
            'role' => Role::supplier->value, // Assign Supplier role
        ]);
    }
}


