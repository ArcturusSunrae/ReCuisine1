<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FoodItem;

class ApplyDiscounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:apply-discounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $foodItems = FoodItem::all();

        foreach ($foodItems as $foodItem) {
            $foodItem->applyDiscount();
        }

        $this->info('Discounts applied successfully!');
    }
}
