<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosSale extends Model
{
    use HasFactory;

    protected $fillable = ['food_item_id', 'quantity_sold'];

    public function fooditem()
    {
        //return $this->belongsTo(FoodItem::class, 'food_item_id');

        return $this -> hasOne('App\Models\FoodItem', 'id', 'food_item_id');
    }
}
