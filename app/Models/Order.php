<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'name',
        'email',
        'quantity',
        'price',
        'status',
        'user_id',
        'food_item_id'
    ];

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function fooditem()
    {
        //return $this->belongsTo(FoodItem::class, 'food_item_id');

        return $this -> hasOne('App\Models\FoodItem', 'id', 'food_item_id');
    }



}
