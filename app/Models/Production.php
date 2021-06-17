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
         'recipes_id','id_products', 'qty', 'date'
    ];

    protected $hidden = [];
}
