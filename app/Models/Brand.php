<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Brand extends Model
{
    use HasFactory, SoftDeletes, Sluggable, SluggableScopeHelpers;
    protected $fillable=['brand_name','image'];
    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'brand_name'
            ]
        ];
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}
