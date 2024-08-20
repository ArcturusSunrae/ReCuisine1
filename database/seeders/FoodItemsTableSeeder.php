<?php

namespace Database\Seeders;

use App\Models\FoodItem;
use Illuminate\Database\Seeder;

class FoodItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        FoodItem::factory(10)->create();


        FoodItem::factory()->create([
            'title' => 'Burger',
            'description' => 'A delicious burger',
            'price' => 10.00,
            'supplier' => 'Burger King',
            'category' => 'Fast Food',
            'quantity' => 100,
            'tags' => 'burger, fast food, delicious',
        ]);

    }
}
