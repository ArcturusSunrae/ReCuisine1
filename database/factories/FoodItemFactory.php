<?php

namespace Database\Factories;

use App\Models\FoodItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FoodItemFactory extends Factory
{
    protected $model = FoodItem::class;

    public function definition()
    {
        return [
            'title' => 'Sample Food Item',
            'description' => 'This is a description of a food item.',
            'price' => 50.00,
            'supplier_id' => 1,
            'supplier' => 'Sample Supplier',
            'category' => 'Sample Category',
            'stock' => 10,
            'tags' => 'sample, food, item',
            //'image' => 'default.jpg', // Add your logic to handle images
            //'rating' => $this->faker->numberBetween(1, 5),
            //'reviews' => $this->faker->numberBetween(0, 500),
        ];
    }
}


