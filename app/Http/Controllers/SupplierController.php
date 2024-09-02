<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
