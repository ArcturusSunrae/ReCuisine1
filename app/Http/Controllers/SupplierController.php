<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    public function supplierForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('supplier-form');
    }



    public function dashboard(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('supplier.dashboard');
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

        $user = User::create([
            'name' => $request->business_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => Role::Supplier->value, // Set the role to Supplier (3)
        ]);

        Supplier::create([
            'user_id' => $user->id,
            'business_name' => $request->business_name,
            'phone' => $request->phone,
            'location' => $request->location,
        ]);

        Auth::login($user);

        return redirect()->route('supplier.dashboard');
    }

}
