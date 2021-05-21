<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class discount extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = "discounts";
    protected $fillable = [
        'name_disc', 'discount', 'status'
    ];
    public function products()
    {
        return $this->belongsToMany(product::class,'discount_product','products_id','discounts_id');
    }
}
