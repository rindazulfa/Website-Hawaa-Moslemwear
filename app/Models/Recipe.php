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
        'stocks_id','materials_id','qty','satuan'
    ];

    protected $hidden =[

    ];

    public function stok(){
        return $this->belongsTo(stock::class, 'stocks_id', 'id');
    }

    public function material(){
        return $this->belongsTo(material::class, 'materials_id', 'id');
    }
    
    public function produksi()
    {
        return $this->hasMany(Production::class, 'productions_id', 'id');
    }

}
