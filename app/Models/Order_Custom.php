<?php

namespace App\Models;

use App\ConfirmPayment;
use App\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Order_Custom extends Model
{
    // use SoftDeletes;
    protected $table = "order_customs";  
    protected $fillable = [
        'customer_id','products_id','confirm_payments_id','date','status_pengerjaan',
        'status_pembayaran','shipping', 'ongkir', 'keterangan','total'
    ];
    protected $hidden =[

    ];

    public function customer(){
        return $this->belongsTo(customer::class, 'customers_id', 'id');
    }

    public function produk(){
        return $this->belongsTo(product::class, 'products_id', 'id');
    }
    public function confirm(){
        return $this->belongsTo(confirm_payment::class, 'confirm_payments_id', 'id');
    }
}
