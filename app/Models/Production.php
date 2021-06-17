<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Production extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "productions";
    protected $fillable = [
         'recipes_id','stocks_id', 'qty', 'date'
    ];

    protected $hidden = [];
    
    public function resep(){
        return $this->belongsTo(Recipe::class, 'recipes_id', 'id');
    }

    public function stok(){
        return $this->belongsTo(stock::class, 'stocks_id', 'id');
    }
    
}
