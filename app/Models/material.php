<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class material extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = "materials";
    protected $fillable = [
         'name', 'price', 'qty', 'satuan'
    ];

    protected $hidden = [];


    // public function supplier()
    // {
    //     return $this->hasMany(supplier::class, 'materials_id', 'id');
    // }

    public function resep()
    {
        return $this->hasMany(Recipe::class, 'materials_id', 'id');
    }

   
}
