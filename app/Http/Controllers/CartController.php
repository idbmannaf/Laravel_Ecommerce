<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\UsedCoupon;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;

class CartController extends Controller
{
    public function cart($coupon_code =' '){

        if (cart::where('random_id',Cookie::get('generate_cart_id'))->first() == null){
            return redirect()->to('/');
        }
        if ($coupon_code == ' '){
            $discount = 0;
            $coupon_msg = '';
        }else{
            if (Coupon::where('coupon',$coupon_code)->exists()){
                $coupon_validity= Coupon::where('coupon',$coupon_code)->first()->coupon_validity;
                $discount =Coupon::where('coupon',$coupon_code)->first()->value;
                $coupon_msg = "valid";
                if ($coupon_validity > Carbon::now()->format('Y-m-d')){
                    $cart_item_total= cart::with('product')->where('random_id',Cookie::get('generate_cart_id'))->get();
                    $total=0;
                    foreach ($cart_item_total as $cart){
                        $total += $cart->product->price * $cart->quantity;
                    }
                    if (Coupon::where('coupon',$coupon_code)->first()->max_price){
                        if ($total > Coupon::where('coupon',$coupon_code)->first()->max_price){
                            $discount =0;
                            $coupon_msg = 'Total price must be maximum'.Coupon::where('coupon',$coupon_code)->first()->max_price;
                        }
                    }
                    if (UsedCoupon::where('user_id',Auth::id())->where('coupon_id',Coupon::where('coupon',$coupon_code)->first()->id)->exists()){
                        $discount =0;
                        $coupon_msg = "You are already used this Coupon";
                    }
//                    if (Coupon::where('coupon',$coupon_code)->first()->user_id == Auth::id()){
//                        $discount =0;
//                        $coupon_msg = "You are already used this Coupon";
//                    }

                    if (Coupon::where('coupon',$coupon_code)->first()->max_used <= 0){
                        $discount =0;
                        $coupon_msg = "Coupon Max used";
                    }
//                    $discount =Coupon::where('coupon',$coupon_code)->first()->value;
//                    $coupon_msg = "valid";

                }else{
                    $discount =Coupon::where('coupon',$coupon_code)->first()->value;
                    $coupon_msg = 'This Coupons Code Expired';
                }
            }else{
                $discount =0;
                $coupon_msg = 'There Is No Coupon That you Entered';
            }
        }
            $cart_products= cart::with('product')->where('random_id',Cookie::get('generate_cart_id'))->orWhere('user_id',Auth::id())->get();
            return view('front.cart.index',compact('cart_products','coupon_msg','discount','coupon_code'));


    }
    public function addToCart($slug){
      $product= Product::where('slug',$slug)->first();

      if (Cookie::get('generate_cart_id')){
          $random_id= Cookie::get('generate_cart_id');
      }else{
          $random_id= Str::random(16);
          Cookie::queue(Cookie::make('generate_cart_id', $random_id, 20160)); //20160 = 14 day thakbe
      }
      if (cart::where('random_id',$random_id)->where('product_id',$product->id)->exists()){
          cart::where('random_id',$random_id)->where('product_id',$product->id)->increment('quantity');
      }elseif (Wishlist::where('product_id',$product->id)->exists()){
          Wishlist::where('product_id',$product->id)->delete();
      }
      else{
          $add_to_cart= new cart();
          $add_to_cart->product_id= $product->id;
          $add_to_cart->user_id= Auth::id();
          $add_to_cart->random_id= $random_id;
          $add_to_cart->quantity= 1;
          $add_to_cart->created_at= Carbon::now();
          $add_to_cart->updated_at= null;
          $add_to_cart->save();
      }
      return redirect()->back()->with('success','Product Added to Cart!!');

    }
    public function deleteCartItem(Request $request){
        try {
            cart::where('id',$request->id)->delete();
            return 'yes';
        }catch (\Exception $e){
            return 'no';
        }
    }
    public function updateCart(Request $request){

        try {
            foreach ($request->quantity as $cart_id => $cart_quantity){
                $g=  cart::where('id',$cart_id)->update([
                    'quantity'=>$cart_quantity
                ]);
            }
            return redirect()->back()->with('success,"product Updated Successfully!');
        }catch (\Exception $e){
            return redirect()->back()->with('fail,"Something Wrong!');
        }
    }

    public function checkout(){
        if (Auth::user()->role ==2){
        return redirect()->back()->with('fail','You are a Admin !! You not able to place order');
        }
        if (!session('total')){
            return redirect()->back();
        }
        return view('front.checkout');
    }

}
