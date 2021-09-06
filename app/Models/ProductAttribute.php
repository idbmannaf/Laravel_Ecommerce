<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttribute extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'att1','att1-val', 'att2','att2-val','att3','att1-va3','att4','att4-val','att5','att5-val','att6','att6-val','att7','att7-val','att8','att8-val'
    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

}
