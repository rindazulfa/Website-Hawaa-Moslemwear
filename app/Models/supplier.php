<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class supplier extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = "suppliers";  
    protected $fillable = [
        'materials_id','name','address','email','phone'
    ];

    protected $hidden =[

    ];

    public function material(){
        return $this->belongsTo(material::class, 'materials_id', 'id');
    }
}
