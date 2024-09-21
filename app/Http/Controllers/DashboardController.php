<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Enums\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {

        $foodItems = FoodItem::all();
        //return view('home', compact('foodItems'));

        $count = 0; // Default value if the user is not authenticated

        if (Auth::check()) { // Check if the user is authenticated
            $user = Auth::user();
            $count = Cart::where('user_id', $user->id)->count();
        }

        return view('home', compact('foodItems', 'count'));


    }

    public function authenticated()
    {


        $user = Auth::user();  // Get the authenticated user

        if ($user->role === Role::admin->value) {
            return redirect()->route('admin.dashboard');
        }

        elseif ($user->role === Role::supplier->value) {
            return redirect()->route('supplier.dashboard');
        }

        elseif ($user->role === Role::customer->value) {
            return redirect()->route('dashboard');
        }

       //dd($user->role);


        return redirect()->route('home');  // Fallback in case no role is matched


    }

    public function add_cart(Request $request, $id)
    {
        $foodItem = FoodItem::findOrFail($id);

        $user = Auth::user();
        $user_id = $user->id;

        $data = new Cart;
        $data->user_id = $user_id;
        $data->food_item_id = $foodItem->id;
        $data->quantity = $request->quantity; // Get quantity from the request
        $data->price = $foodItem->price * $request->quantity; // Calculate price

        $data->save();

        // Calculate the updated cart count for the user
        $count = Cart::where('user_id', $user_id)->count();

        return redirect()->back()->with('success', 'Item added to cart successfully!')->with('count', $count);
    }


    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
            $cart = Cart::where('user_id', $user_id)->get();

            // Pass both $count and $cart to the view
            return view('mycart', compact('count', 'cart'));
        }

    }

    public function remove_cart($id)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Find the cart item by ID and user ID to ensure security
            $cartItem = Cart::where('id', $id)->where('user_id', $user->id)->first();

            if ($cartItem) {
                $cartItem->delete(); // Delete the cart item
                return redirect()->back()->with('success', 'Item removed from cart successfully!');
            }
        }

        return redirect()->back()->with('error', 'Failed to remove item from cart.');
    }

//    public function paymentmethod()
//    {
//        return view('paymentmethod');
//    }


    public function paymentmethod()
    {
        $user = Auth::user();

        // Check if the cart is empty for the current user
        $cartItemCount = Cart::where('user_id', $user->id)->count();

        if ($cartItemCount === 0) {
            // If the cart is empty, redirect back with an error message
            return redirect()->back()->with('error', 'The cart is empty. Please add items to your cart before proceeding to checkout.');
        }

        // If the cart is not empty, proceed to the payment method page
        //return view('paymentmethod');


    }
}

