<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create 10 suppliers
       // Supplier::factory()->count(10)->create();

        Supplier::factory()->create([
            'user_id' => '4',
            'business_name' => 'Supplier',
            'phone' => '0769834657',
            'location' => 'Colombo',
            'closing_time' => '16:00:00',

        ]);

        Supplier::factory()->create([
            'user_id' => '5',
            'business_name' => 'Subway',
            'phone' => '0769094057',
            'location' => 'Colombo',
            'closing_time' => '10:00:00',

        ]);

    }
}
