<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

//    public function foodItem(){
//        return $this->hasOne('App\Models\FoodItem', 'id', 'food_item_id');
//    }

    public function fooditem()
    {
        return $this->belongsTo(FoodItem::class, 'food_item_id');
    }






}

