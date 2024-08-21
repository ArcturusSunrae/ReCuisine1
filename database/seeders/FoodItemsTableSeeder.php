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
            'price' => 10.00,
            'supplier' => 'Burger King',
            'category' => 'Fast Food',
            'quantity' => 100,
            'tags' => 'burger, fast food, delicious',
        ]);


        FoodItem::factory()->create([
            'title' => 'Pizza Margherita',
            'description' => 'Classic pizza with fresh tomatoes and mozzarella cheese',
            'price' => 15.00,
            'supplier' => 'Pizza Hut',
            'category' => 'Pizza',
            'quantity' => 50,
            'tags' => 'pizza, margherita, Italian',
        ]);

        FoodItem::factory()->create([
            'title' => 'Sushi Platter',
            'description' => 'An assortment of fresh sushi and sashimi',
            'price' => 25.00,
            'supplier' => 'Sushi Express',
            'category' => 'Japanese',
            'quantity' => 30,
            'tags' => 'sushi, sashimi, Japanese, seafood',
        ]);

        FoodItem::factory()->create([
            'title' => 'Tandoori Chicken',
            'description' => 'Spicy and flavorful grilled chicken',
            'price' => 12.50,
            'supplier' => 'Tandoori Palace',
            'category' => 'Indian',
            'quantity' => 60,
            'tags' => 'tandoori, chicken, Indian, spicy',
        ]);

        FoodItem::factory()->create([
            'title' => 'Caesar Salad',
            'description' => 'Crisp romaine lettuce with Caesar dressing',
            'price' => 8.00,
            'supplier' => 'Healthy Bites',
            'category' => 'Salad',
            'quantity' => 40,
            'tags' => 'salad, Caesar, healthy, vegetarian',
        ]);

        FoodItem::factory()->create([
            'title' => 'Spaghetti Bolognese',
            'description' => 'Traditional Italian pasta with rich meat sauce',
            'price' => 13.00,
            'supplier' => 'Pasta House',
            'category' => 'Pasta',
            'quantity' => 70,
            'tags' => 'pasta, Bolognese, Italian, meat',
        ]);

        FoodItem::factory()->create([
            'title' => 'Grilled Salmon',
            'description' => 'Tender salmon fillet with lemon and herbs',
            'price' => 20.00,
            'supplier' => 'Seafood Delight',
            'category' => 'Seafood',
            'quantity' => 25,
            'tags' => 'salmon, grilled, seafood, healthy',
        ]);

        FoodItem::factory()->create([
            'title' => 'Chocolate Cake',
            'description' => 'Rich and moist chocolate cake with ganache frosting',
            'price' => 7.00,
            'supplier' => 'Sweet Treats',
            'category' => 'Dessert',
            'quantity' => 80,
            'tags' => 'cake, chocolate, dessert, sweet',
        ]);

        FoodItem::factory()->create([
            'title' => 'Pad Thai',
            'description' => 'Stir-fried noodles with shrimp, tofu, and peanuts',
            'price' => 14.00,
            'supplier' => 'Thai Spice',
            'category' => 'Thai',
            'quantity' => 45,
            'tags' => 'pad thai, noodles, Thai, spicy',
        ]);

        FoodItem::factory()->create([
            'title' => 'Beef Tacos',
            'description' => 'Soft tortillas filled with seasoned beef and fresh toppings',
            'price' => 9.00,
            'supplier' => 'Taco Time',
            'category' => 'Mexican',
            'quantity' => 90,
            'tags' => 'tacos, beef, Mexican, spicy',
        ]);

        FoodItem::factory()->create([
            'title' => 'Mango Smoothie',
            'description' => 'Refreshing smoothie made with ripe mangoes',
            'price' => 5.50,
            'supplier' => 'Smoothie Bar',
            'category' => 'Beverage',
            'quantity' => 100,
            'tags' => 'smoothie, mango, beverage, healthy',
        ]);
    }



}
