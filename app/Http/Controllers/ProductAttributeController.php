<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index(){
        $all_attributes= ProductAttribute::with('product')->get();
        return  view('admin.attributes.index', compact('all_attributes'));
    }
    public function view($id){
        $attribute= ProductAttribute::where('product_id',$id)->orderBy('id',"DESC")->get();
        return view('admin.products.attrview',compact('attribute'));
    }

    public function add(Request $request){
       $request->validate([
           'attribute_name'=>'required',
           'attribute_value'=>'required'
       ]);

//       dd($request->product_id);
       $data=[
           'product_id'=> $request->product_id,
           'attribute_name'=>$request->attribute_name,
           'attribute_value'=>$request->attribute_value,
           'created_at'=>Carbon::now()
       ];
       ProductAttribute::insert($data);
       return redirect()->back()->with('success',"Product Attributes Added Successfully");
    }
    public function destroy($id){
       ProductAttribute::where('id',$id)->forceDelete();
       return back()->with('success', 'Product Attribute Successfully Deleted');
    }
}
