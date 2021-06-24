<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class stock extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = "stocks";  
    protected $fillable = [
        'products_id','qty','satuan','size'
    ];

    protected $hidden =[

    ];

    public function product(){
        return $this->belongsTo(product::class, 'products_id', 'id');
    }
    public function resep()
    {
        return $this->hasMany(Recipe::class, 'stocks_id', 'id');
    }
    public function produksi()
    {
        return $this->hasMany(Production::class, 'stocks_id', 'id');
    }
    public function cart(){
        return $this->hasMany(cart::class,'stocks_id','id');
    }
}
