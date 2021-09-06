<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Product;
use App\Models\BillingDetails;
use App\Models\cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\UsedCoupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    public function index(CheckoutRequest $request){
        if (Order::orderBy('id',"DESC")->latest())
        if ($request->payment_type == "cod"){
           $order= new Order();
           $order->user_id= Auth::id();
           $order->total = session('total');
           $order->discount = session('discount');
           $order->tax = null;
           $order->subtotal = session('subtotal');
           $order->payment_type = $request->payment_type;
           $order->save();
            $cart_products= cart::with('product')->where('random_id',Cookie::get('generate_cart_id'))->get();
           foreach ($cart_products as $cart_p){
               $order_details= new OrderDetails();
               $order_details->order_id = $order->id;
               $order_details->user_id= Auth::id();
               $order_details->quantity= $cart_p->quantity;
               $order_details->product_id= $cart_p->product_id;
               $order_details->product_name= $cart_p->product->title;
               $order_details->product_price= $cart_p->product->price;
               $order_details->save();
               Product::find($cart_p->product_id)->decrement('qty',$cart_p->quantity);
           }
           $billing_details= new BillingDetails();
           $billing_details->order_id= $order->id;
           $billing_details->user_id= Auth::id();
           $billing_details->first_name= $request->first_name;
           $billing_details->last_name= $request->last_name;
           $billing_details->company_name= $request->company_name;
           $billing_details->email= $request->email;
           $billing_details->country= $request->country;
           $billing_details->phone= $request->phone;
           $billing_details->address= $request->address;
           $billing_details->note= $request->note;
           $billing_details->save();

            //Delete Cart Data
            cart::where('random_id',Cookie::get('generate_cart_id'))->delete();

            // Update Coupon
            if (session('discount')){
                Coupon::where('coupon',session('coupon_code'))->decrement('max_used');
                Coupon::where('coupon',session('coupon_code'))->increment('used');
                $used_coupon_data= [
                    'user_id'=>Auth::id(),
                    'coupon_id'=> Coupon::where('coupon',session('coupon_code'))->first()->id
                ];
                UsedCoupon::insert($used_coupon_data);
//                Coupon::where('coupon',session('coupon_code'))->update([
//                    'user_id'=>Auth::id(),
//                ]);
            }
           return redirect()->to('/')->with('success','Your Order Pending');
        }else{
            return "Offline Payment";
        }
    }
    public function delete_order($id){
        try {
            OrderDetails::where('order_id',$id)->delete();
            BillingDetails::where('order_id',$id)->delete();
            Order::destroy($id);
            return redirect()->back()->with('success','Order Successfully Deleted');
        }catch (\Exception $e){
            return redirect()->back()->with('fail','Something Wrong');
        }
    }
    public function reorder($id){
        try {
            Order::find($id)->update([
                'status'=>'processing'
            ]);
            return redirect()->back()->with('success','Re Order Successfully Created');
        }catch (\Exception $e){
            return redirect()->back()->with('fail','Something Wrong');
        }
    }
    public function viewOrder($id){
        $billing_details= BillingDetails::where('order_id',$id)->first();
        $ordered_product= OrderDetails::with('product')->where('order_id',$id)->get();
        return view('front.user_details.orderbyid',compact('billing_details','ordered_product'));
    }

    public function text(){
        $order= Order::select('invoice')->max('invoice');
        if ($order){
            $order1 =explode("-", $order);
            $order_invoice_id= $order1[1]+1;
        }else{
            $order_invoice_id= "DMF-0000001";
        }
        echo $order_invoice_id;

}
}
