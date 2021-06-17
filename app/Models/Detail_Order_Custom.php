<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail_Order_Custom extends Model
{
    use SoftDeletes;
    protected $table = "detail_order_customs";  
    protected $fillable = [
        'order_customs_id','qty','satuan','subtotal','qty','pict_desain'
    ];
    protected $hidden =[

    ];
}
