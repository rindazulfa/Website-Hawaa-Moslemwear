<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = "recipes";  
    protected $fillable = [
        'products_id','qty','satuan'
    ];

    protected $hidden =[

    ];

    public function product(){
        return $this->belongsTo(product::class, 'products_id', 'id');
    }
}
