<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = "products";
    protected $fillable = [
         'name', 'price', 'desc', 
      'category', 'pict_1', 'pict_2', 'pict_3'
    ];

    protected $hidden = [];


    public function stok()
    {
        return $this->hasMany(stock::class, 'products_id', 'id');
    }
 
    public function discounts()
    {
        return $this->belongsToMany(discount::class,'discount_product','products_id','discounts_id');
    }

    
    public function ordercustom()
    {
        return $this->hasMany(Order_Custom::class, 'products_id', 'id');
    }
}
