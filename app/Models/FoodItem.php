<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodItem extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'supplier_id',
        'supplier',
        'category',
        'tags',
        'stock',

        'discount_rate',
//        'inventory_threshold',
//        'time_before_closing',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to the 'orders' table
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relationship to the 'pos_sales' table (POS system sales)
    public function posSales()
    {
        // Link to the dummy POS system sales data
        return $this->hasMany(PosSale::class);
    }




    public function applyDiscount()
    {
        $supplier = $this->user;
        $current_time = now();

        // If the supplier has set a closing time
        if ($supplier->closing_time) {
            $closing_time = \Carbon\Carbon::parse($supplier->closing_time);
            $closing_time_today = $closing_time->copy()->setDate($current_time->year, $current_time->month, $current_time->day);

            // Calculate the 3-hour discount window
            $discount_start_time = $closing_time_today->subHours(3);

            if ($current_time->between($discount_start_time, $closing_time_today)) {
                // Apply the 50% discount
                $this->discount_rate = 50;
                $this->save();
            } else {
                // Reset discount if outside the 3-hour window
                $this->discount_rate = 0;
                $this->save();
            }
        }
    }


//
//    public function applyInventoryDiscount()
//    {
//        $currentStock = $this->stock;
//        $threshold = $this->inventory_threshold;
//
//        if ($currentStock <= ($this->stock * ($threshold / 100))) {
//            $this->price = $this->price * (1 - ($this->discount_rate / 100));
//            $this->save();
//        }
//    }




}
