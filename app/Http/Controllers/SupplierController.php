<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function supplierForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('supplier-form');
    }

    public function updateSupplier(Request $request): \Illuminate\Http\RedirectResponse
    {
        // validate the request based on the form fields added in the form
        if(auth()->check()){
            auth()->user()->update([
                'role' => 'supplier'
            ]);
        }

        return redirect()->route(route: 'supplier');
    }
}
