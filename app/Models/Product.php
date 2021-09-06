<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Tests\SoftDeleteTests;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Monolog\Handler\SlackWebhookHandler;

class Product extends Model
{
    use HasFactory,Sluggable,SoftDeletes,SluggableScopeHelpers;
    protected $fillable=[
        'cat_id','sub_cat_id','brand_id','title','details','price','qty','sku','image','location'
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'sub_cat_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function cart(){
        return $this->hasMany(cart::class,'product_id');
    }
}
