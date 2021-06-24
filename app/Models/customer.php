<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = "customers";
    protected $fillable = [
       'users_id','address','city','province','postal_code','status','phone'
    ];

    protected $hidden =[

    ];

    public function Orders()
    {
        return $this->hasMany('App\order','customers_id');
    }

    public function users()
    {
        return $this->belongsTo("App\User");
    }

    public function ordercustom()
    {
        return $this->hasMany('App\order','customers_id');
    }
    public function cart(){
        return $this->hasMany(cart::class,'customers_id','id');
    }

}
