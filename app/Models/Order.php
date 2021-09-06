<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'status','invoice'
    ];
    public function orderdetails(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }
    public function billingdetails(){
        return $this->hasMany(BillingDetails::class,'order_id');
    }
}
