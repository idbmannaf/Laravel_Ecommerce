<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Tests\SoftDeleteTests;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class BundleProduct extends Model
{
    use HasFactory, SoftDeletes,Sluggable,SluggableScopeHelpers;
    public function sluggable(): array
    {
       return [
           'slug'=>[
               'source' => 'title'
           ]
       ];
    }
}
