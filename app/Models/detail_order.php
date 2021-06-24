<?php

namespace App\Models;

use App\Stok;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detail_order extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = "detail_orders";  
    protected $fillable = [
        'orders_id','products_id','customers_id','size','qty','satuan','subtotal'
    ];
    protected $hidden =[

    ];
    public function products(){
        return $this->belongsTo(product::class, 'products_id', 'id');
    }
    public function customer(){
        return $this->belongsTo(customer::class, 'customers_id', 'id');
    }

    public function order(){
        return $this->belongsTo(order::class, 'orders_id', 'id');
    }
    public function stok(){
        return $this->hasMany(stock::class,'stocks_id','id');
    }
}
