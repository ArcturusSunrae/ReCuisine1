<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFoodItemRequest;
use App\Models\FoodItem;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Supplier;
use App\Models\User;
use App\Enums\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class SupplierController extends Controller
{
    public function supplierForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('supplier-form');
    }

    public function updateSupplier(Request $request, $id)
    {
        // 1. Validate the incoming data
        $validatedData = $request->validate([
            'business_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:suppliers,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',


        ]);

        // 2. Find the supplier by ID
        $supplier = Supplier::find($id);

        // Check if supplier exists
        if (!$supplier) {
            return redirect()->back()->with('error', 'Supplier not found.');
        }

        // 3. Update the supplier's information
        $supplier->update($validatedData);

        // 4. Redirect back with a success message
        return redirect()->route('supplier.dashboard')->with('success', 'Supplier updated successfully.');
    }

//    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
//    {
//        return view('supplier-fooditems', [
//            'foodItems' => FoodItem::all(),
//    ]);
//    }

    public function dashboard()
    {
        return view('supplier.supplier-dashboard');
    }

    public function foodItems()
    {
        return view('supplier.supplier-fooditems', [
            'foodItems' => FoodItem::all(),
        ]);
    }

    public function orders()
    {

        $data = Order::all();

        return view('supplier.supplier-orders', compact('data'));

       // return view('supplier.supplier-orders');

    }



    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->business_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => Role::supplier->value,
            ]);

            Supplier::create([
                'user_id' => $user->id,
                'business_name' => $request->business_name,
                'phone' => $request->phone,
                'location' => $request->location,
            ]);

            Auth::login($user);
        });

        return redirect()->route('supplier.dashboard');
    }


    //edit function
    public function edit(FoodItem $foodItem)
    {
        return view('supplier.edit', [
            'fooditem' => $foodItem,
        ]);

    }

    public function update(UpdateFoodItemRequest $request, FoodItem $foodItem)
    {
        $foodItem->update($request->validated());

        return redirect()->route('supplier.supplier-fooditems')
        ->with('success', 'Food item updated successfully.');
    }

    public function create(FoodItem $foodItem)
    {
        return view('supplier.create', [
            'fooditem' => $foodItem,
        ]);

        // Fetch all food items
//        $foodItems = FoodItem::all();
//
//        // Pass the food items collection to the view
//        return view('supplier.create', compact('foodItems'));
    }


//    public function store(Request $request): \Illuminate\Http\RedirectResponse
//    {
//        $request->validate([
//            'business_name' => 'required|string|max:255',
//            'phone' => 'required|string|max:15',
//            'location' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:8|confirmed',
//        ]);
//
//        $user = User::create([
//            'name' => $request->business_name,
//            'email' => $request->email,
//            'password' => Hash::make($request->password),
//            'role' => Role::supplier->value, // Set the role to Supplier (3)
//        ]);
//
//        Supplier::create([
//            'user_id' => $user->id,
//            'business_name' => $request->business_name,
//            'phone' => $request->phone,
//            'location' => $request->location,
//        ]);
//
//        Auth::login($user);
//
//        return redirect()->route('supplier.dashboard');
//    }



}
