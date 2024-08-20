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
        'quantity',
        'tags',
    ];
}
