<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['name','deleted_at'];

    use Sluggable, SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
//    public function subcategory()
//    {
//        // return $this->belongsTo('todoparrot\Todolist');
//        return $this->belongsTo(SubCategory::class);
//    }
    public function subcategory()
    {
        // return $this->belongsTo('todoparrot\Todolist');
        return $this->hasMany(SubCategory::class,'cat_id');
    }
    public function product(){
        return$this->hasMany(Product::class,'cat_id');
    }


}
