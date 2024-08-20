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
            'Title' => $this->faker->word,
            'Description' => $this->faker->sentence,
            'Price' => $this->faker->randomFloat(2, 10, 5000),
            'Supplier' => $this->faker->company,
            'Category' => $this->faker->word,
            'Quantity' => $this->faker->numberBetween(1, 100),
            'Tags' => implode(',', $this->faker->words(3)),
            //'image' => 'default.jpg', // Add your logic to handle images
            //'rating' => $this->faker->numberBetween(1, 5),
            //'reviews' => $this->faker->numberBetween(0, 500),
        ];
    }
}
