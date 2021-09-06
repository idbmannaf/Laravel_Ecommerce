<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;
    use Sluggable,SluggableScopeHelpers;
    protected $fillable=['name'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

//    public function category()
//    {
//        return $this->hasMany(Category::class);
//    }
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}
