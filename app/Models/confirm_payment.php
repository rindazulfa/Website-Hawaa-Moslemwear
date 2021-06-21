<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class confirm_payment extends Model
{
    use HasFactory;
    protected $table = "confirm_payments";
    protected $fillable = [
       'payment_purpose','transfer_date','transfer_amount','proof_of_payment','description'
    ];
}
