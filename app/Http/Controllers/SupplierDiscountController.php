<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;

class SupplierDiscountController extends Controller
{
    // Show form for updating discount settings
    public function edit($id)
    {
        $foodItem = FoodItem::findOrFail($id);


        //  return view('supplier.discount-settings', compact('foodItem'));
    }

    // Update the discount settings
    public function update(Request $request, $id)
    {
        $request->validate([
            'discount_rate' => 'required|numeric|min:0|max:100',
            'inventory_threshold' => 'required|numeric|min:0|max:100',
            'time_before_closing' => 'required|numeric|min:0',
        ]);

        $foodItem = FoodItem::findOrFail($id);
        $foodItem->update([
            'discount_rate' => $request->discount_rate,
            'inventory_threshold' => $request->inventory_threshold,
            'time_before_closing' => $request->time_before_closing,
        ]);

        return redirect()->back()->with('success', 'Discount settings updated successfully!');
    }
}
