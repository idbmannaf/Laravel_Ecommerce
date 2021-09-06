<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShopCategoryBrand extends Controller
{
    public function category(){
        $categories_all= Category::all();
        $products_all= Product::with('brand')->orderby('id','DESC')->get();
        return view('front.category.index',compact('categories_all','products_all'));
    }
    public function single_category($slug){

        $single_cat= Category::where('slug',$slug)->first();
        $single_cat_products= Product::where('cat_id',$single_cat->id)->get();
        $category_to_subcategory= SubCategory::where('cat_id',$single_cat->id)->get();

        return view('front.category.single',compact('single_cat_products','category_to_subcategory','single_cat'));
    }

    public function single_subcategory($slug){

        $subcat= SubCategory::where('slug',$slug)->first();
        $all_subcategory= SubCategory::orderby('id','DESC')->get();
        $subcat_products= Product::where('sub_cat_id',$subcat->id)->get();
        return view('front.subcategory.index', compact('subcat','all_subcategory','subcat_products'));
    }
}
