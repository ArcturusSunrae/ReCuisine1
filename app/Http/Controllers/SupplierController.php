<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class SupplierController extends Controller
{
    public function supplierForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('supplier-form');
    }



    public function dashboard()
    {
        return view('supplier.supplier-dashboard');
    }

    public function foodItems()
    {
        return view('supplier.supplier-fooditems');
    }

    public function orders()
    {

        $data = Order::all();

        return view('supplier.supplier-orders', compact('data'));

       // return view('supplier.supplier-orders');

    }

}
