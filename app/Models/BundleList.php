<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Tests\SoftDeleteTests;
use Illuminate\Database\Eloquent\SoftDeletes;

class BundleList extends Model
{
    use HasFactory, SoftDeletes;
}
