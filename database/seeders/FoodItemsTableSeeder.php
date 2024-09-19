<?php

namespace Database\Seeders;

use App\Models\FoodItem;
use Illuminate\Database\Seeder;

class FoodItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        //need to get the food items that the food suppliers have uploaded

        // FoodItem::factory(10)->create();


        FoodItem::factory()->create([
            'title' => 'Burger',
            'description' => 'A delicious burger',
            'price' => 400.00,
            'supplier' => 'Burger King',
            'category' => 'Fast Food',
            'stock' => 100,
            'tags' => 'burger, fast food, delicious',
        ]);

        FoodItem::factory()->create([
            'title' => 'Pizza',
            'description' => 'A delicious pizza',
            'price' => 500.00,
            'supplier' => 'Pizza Hut',
            'category' => 'Fast Food',
            'stock' => 100,
            'tags' => 'pizza, fast food, delicious',
        ]);

        FoodItem::factory()->create([
            'title' => 'Fried Chicken',
            'description' => 'A delicious fried chicken',
            'price' => 350.00,
            'supplier' => 'KFC',
            'category' => 'Fast Food',
            'stock' => 100,
            'tags' => 'fried chicken, fast food, delicious',
        ]);

        FoodItem::factory()->create([
            'title' => 'Spaghetti',
            'description' => 'A delicious spaghetti',
            'price' => 650.00,
            'supplier' => 'Jollibee',
            'category' => 'Fast Food',
            'stock' => 100,
            'tags' => 'spaghetti, fast food, delicious',
        ]);

        FoodItem::factory()->create([
            'title' => 'Ice Cream',
            'description' => 'A delicious ice cream',
            'price' => 250.00,
            'supplier' => 'McDonalds',
            'category' => 'Dessert',
            'stock' => 100,
            'tags' => 'ice cream, dessert, delicious',
        ]);

    }



}
