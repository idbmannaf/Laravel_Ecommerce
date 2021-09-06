<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlist(){
        return view('front.wishlist');
    }
    public function add_wishlist($slug){
        try {
            Wishlist::insert([
                'user_id'=>Auth::id(),
                'product_id'=>Product::where('slug',$slug)->first()->id,
                'created_at'=>Carbon::now()
            ]);
            return redirect()->back()->with('success','This Product added to Wishlist');
        }catch (\Exception $e){
            return redirect()->back()->with('fail','Something Wrong');
        }
    }
}
