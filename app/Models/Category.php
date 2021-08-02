<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'name'
    ];
    public function kategori()
    {
        return $this->hasMany(product::class, 'categories_id', 'id');
    }

 
}
