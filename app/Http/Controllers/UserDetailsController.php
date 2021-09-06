<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\UserDetails;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDetailsController extends Controller
{
    public function index(){
        return view('front.user_details.index');
    }
    public function update_user(Request $request){
        $file = $request->file('image');

      if ($file){
          $file = $request->file('image');
          $path= base_path()."/public/uploads/users/";
          $imageName= mb_substr(str_replace(" ","-",Auth::user()->name),0,70).".".$file->getClientOriginalExtension();
          $file->move($path,$imageName);
      }else{
          $imageName= UserDetails::where('user_id',Auth::id())->first()->image;
      }
      UserDetails::where('user_id',Auth::id())->update([
          'user_id'=>Auth::id(),
          'full_name'=>$request->full_name,
          'phone'=>$request->phone,
          'dob'=>$request->dob,
          'gender'=>$request->gender,
          'image'=>$imageName,
          'country'=>$request->country,
          'city'=>$request->city,
          'post'=>$request->post,
          'address'=>$request->address,
          'updated_at'=>Carbon::now(),
      ]);
      return redirect()->back()->with('success', "Profile Updated");
    }
    public function notification(){
        return view('front.user_details.notification');
    }
    public function invoice(){
        $order_details=Order::where('user_id',Auth::id())->get();
        return view('front.user_details.invoice',compact('order_details'));
    }
    public function address(){
        return view('front.user_details.address');
    }
    public function wishlist(){
        $wishlists= Wishlist::with('product')->where('user_id',Auth::id())->get();
        return view('front.user_details.wishlist',compact('wishlists'));
    }
    public function delete_wishlist($id){
        Wishlist::where('id',$id)->delete();
        return redirect()->back()->with('success','Product Removed form wishlist!');
    }
}
