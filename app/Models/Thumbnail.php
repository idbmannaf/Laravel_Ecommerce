<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Thumbnail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=['image'];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
