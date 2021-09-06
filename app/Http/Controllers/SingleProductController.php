<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index($slug){
        $single= Product::with('category','brand','subcategory')->where('slug',$slug)->first();
        return view('front.single_product',compact('single'));
    }
}
