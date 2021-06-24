<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    protected $table = "orders";
    protected $fillable = [
        'customers_id','confirm_payments_id', 'date', 'total', 'status',
        'keterangan', 'shipping', 'ongkir'
    ];

    protected $dates = ["date", "created_at", "updated_at"];
    protected $hidden = [];
    public function customer()
    {
        return $this->belongsTo(customer::class, 'customers_id', 'id');
    }
    public function confirm()
    {
        return $this->belongsTo(confirm_payment::class, 'confirm_payments_id', 'id');
    }
    public function detail_orders()
    {
        return $this->hasMany(detail_order::class, 'orders_id');
    }
}
