<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function index(){
      $deal_of_the_day= Product::with('category','brand','subcategory')->orderby('id','DESC')->get();
      $categories= Category::with('subcategory')->orderBy('id','DESC')->take(6)->get();
      $cat_product= Category::with('product')->orderBy('id','ASC')->take(4)->get();
      return view('front.index', compact('deal_of_the_day','categories','cat_product'));
  }

}
