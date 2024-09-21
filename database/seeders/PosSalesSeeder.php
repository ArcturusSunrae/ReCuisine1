<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PosSale;
use App\Models\FoodItem;


class PosSalesSeeder extends Seeder
{
    public function run()
    {
        // Get all food items
        $foodItems = FoodItem::all();

        PosSale::create([
            'food_item_id' => 1,
            'quantity_sold' => 50, // Random quantity between 1 and 10
            //'total_amount' => 650, // Random total amount based on price
        ]);





        // Create dummy sales for each food item
//        foreach ($foodItems as $foodItem) {
//            PosSale::create([
//                'food_item_id' => $foodItem->id,
//                'quantity_sold' => rand(1, 10), // Random quantity between 1 and 10
//                'total_amount' => $foodItem->price * rand(1, 10), // Random total amount based on price
//                'sale_time' => now()->subHours(rand(1, 48)) // Random sale time within the last 48 hours
//            ]);
//        }
    }
}
