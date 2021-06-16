<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class puchase extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = "puchases";  
    protected $fillable = [
        'materials_id','suppliers_id','date','keterangan', 'total','harga'
        ,'qty', 'satuan'
    ];

    protected $hidden =[

    ];

    public function material(){
        return $this->belongsTo(material::class, 'materials_id', 'id');
    }
    public function supplier(){
        return $this->belongsTo(supplier::class, 'suppliers_id', 'id');
    }
}
