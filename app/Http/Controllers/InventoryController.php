<?php
namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Method to calculate total inventory for each food item
    public function getInventory()
    {
        // Get all food items
        $foodItems = FoodItem::with('orders', 'posSales')->get();

        foreach ($foodItems as $item) {
            $onlineSales = $item->orders->sum('quantity'); // Sales from the online orders
            $inStoreSales = $item->posSales->sum('quantity_sold'); // Sales from the in-store POS system
            $totalSales = $onlineSales + $inStoreSales;

            // Available stock
            $item->stock = $item->stock - $totalSales;
            $item->save();
        }

      //  return view('inventory.index', compact('foodItems'));

    }




}
