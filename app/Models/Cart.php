<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected $fillable = [
       'products_id','stocks_id','customers_id','size','price','qty','subtotal','date'
    ];
        
    public function customer(){
        return $this->belongsTo(Customer::class, 'customers_id', 'id');
    }

    public function produk(){
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
    
    public function stok(){
        return $this->belongsTo(stock::class, 'stocks_id', 'id');
    }
}
