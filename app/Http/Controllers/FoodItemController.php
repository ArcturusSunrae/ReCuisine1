<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\Cart;
use App\Models\User;

use illuminate\Support\Facades\Auth;

class FoodItemController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $foodItems = FoodItem::all();
        return view('home', compact('foodItems'));


    }
    public function allItems(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $foodItems = FoodItem::all(); // Retrieve all FoodItems from the database
        $count = 0; // Default value if the user is not authenticated

        if (Auth::check()) { // Check if the user is authenticated
            $user = Auth::user();
            $count = Cart::where('user_id', $user->id)->count();
        }

        return view('all-items', compact('foodItems', 'count'));


    }
}
