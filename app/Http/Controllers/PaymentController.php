<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Stripe;
use Session;


class PaymentController extends Controller
{


    public function confirmationSummary(){
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
            $cart = Cart::where('user_id', $user_id)->get();

            // Pass both $count and $cart to the view
            return view('order-confirmation', compact('count', 'cart'));
        }
    }

    public function confirm_order(Request $request)
    {
        $name = Auth::user() -> name;
        $email = Auth::user() -> email;
        $quantity = $request->quantity;
        $price = $request->price;
        $userid = Auth::id();
        $cart = Cart::where('user_id', $userid)->get();

        $orderNumber = '#' . mt_rand(10000, 99999);

        foreach ($cart as $cartItem){
            $order = new Order();
            //$order->order_number = uniqid('Order-');
            //$order->order_number = '#' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
            $order->name = $name;
            $order->email = $email;
            $order->quantity = $cartItem->quantity;
            $order->price = $cartItem->price;
            $order->user_id = $userid;
            $order->food_item_id = $cartItem->food_item_id;
            $order->order_number = $orderNumber;
            $order->payment_status = "Pay at Pickup";
            $order->save();}

        // Clear the cart
        Cart::where('user_id', $userid)->delete();

        return view('order-confirmation', compact('cart', 'order'), ['orderNumber' => $orderNumber]);




    }

    public function stripe($value)
    {
        return view('stripe',compact('value'));
    }

    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create ([
            "amount" => $value * 100,
            "currency" => "lkr",
            "source" => $request->stripeToken,
            "description" => "Test payment."
        ]);

        $name = Auth::user() -> name;
        $email = Auth::user() -> email;
        $quantity = $request->quantity;
        $price = $request->price;
        $userid = Auth::id();
        $cart = Cart::where('user_id', $userid)->get();

        $orderNumber = '#' . mt_rand(10000, 99999);

        foreach ($cart as $cartItem){
            $order = new Order();
            //$order->order_number = uniqid('Order-');
            //$order->order_number = '#' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
            $order->name = $name;
            $order->email = $email;
            $order->quantity = $cartItem->quantity;
            $order->price = $cartItem->price;
            $order->user_id = $userid;
            $order->food_item_id = $cartItem->food_item_id;
            $order->order_number = $orderNumber;
            $order-> payment_status = "Paid Online";
            $order->save();}

        // Clear the cart
        Cart::where('user_id', $userid)->delete();

        return view('order-confirmation', compact('cart', 'order'), ['orderNumber' => $orderNumber]);
    }




}
