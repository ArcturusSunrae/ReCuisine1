<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\Cart;
use App\Models\User;

use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $foodItems = FoodItem::all();
        return view('home', compact('foodItems'));


    }
    public function allItems(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $foodItems = FoodItem::all(); // Retrieve all FoodItems from the database
        $count = 0; // Default value if the user is not authenticated
        $search = $request->input('search');

        $foodItems = FoodItem::where('title', 'LIKE', "%{$search}%")
            ->orWhere('supplier', 'LIKE', "%{$search}%")
            ->get();

        if (Auth::check()) { // Check if the user is authenticated
            $user = Auth::user();
            $count = Cart::where('user_id', $user->id)->count();
        }

        return view('all-items', compact('foodItems', 'count'));



    }


    public function searchItem(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $searchTerm = $request->input('search');

        // Build the query with conditionals
        $foodItems = FoodItem::when($searchTerm, function($query, $searchTerm) {
            $query->where('title', 'LIKE', "%{$searchTerm}%")
                ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                ->orWhere('category', 'LIKE', "%{$searchTerm}%")
                ->orWhere('price', 'LIKE', "%{$searchTerm}%")
                ->orWhere('quantity', 'LIKE', "%{$searchTerm}%")
                ->orWhere('tags', 'LIKE', "%{$searchTerm}%");
        })->get();

        return view('all-items', compact('foodItems', 'searchTerm'));
    }




}
