<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected $fillable = [
       'id_products','id_stocks','id_customers','size','price','qty','subtotal','date'
    ];
}
