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
        'supplier',
        'category',
        'tags',
        'stock',

        'discount_rate',
        'inventory_threshold',
        'time_before_closing',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function applyInventoryDiscount()
    {
        $currentStock = $this->stock;
        $threshold = $this->inventory_threshold;

        if ($currentStock <= ($this->stock * ($threshold / 100))) {
            $this->price = $this->price * (1 - ($this->discount_rate / 100));
            $this->save();
        }
    }




}
