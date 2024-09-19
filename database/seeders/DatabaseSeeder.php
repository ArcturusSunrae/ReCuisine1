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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => Role::customer->value,

        ]);

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

        $this->call([
            PosSalesSeeder::class,
        ]);

        $this->call([
            FoodItemsTableSeeder::class,
        ]);
    }
}
