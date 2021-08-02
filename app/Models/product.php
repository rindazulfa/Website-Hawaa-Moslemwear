<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = "products";
    protected $fillable = [
         'categories_id','name', 'price', 'desc', 
      'pict_1', 'pict_2', 'pict_3'
    ];

    protected $hidden = [];
    public function kategori(){
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function stok()
    {
        return $this->hasMany(stock::class, 'products_id', 'id');
    }
    
    
    public function ordercustom()
    {
        return $this->hasMany(Order_Custom::class, 'products_id', 'id');
    }
    public function cart(){
        return $this->hasMany(Cart::class,'products_id','id');
    }
}
