<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'unit_price',
        'quantity',
        'category_id',
       
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function carts(){
        return $this->HasMany(Cart::class);
    }
}
