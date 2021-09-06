<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\SubCategory;
use App\Models\Thumbnail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Image;

class ProductController extends Controller
{
    public function index()
    {
$products = Product::with('category','brand','subcategory')->get();
        return view('admin.products.index',compact('products'));
    }


    public function create(Request $request)
    {
        $categories= Category::pluck('name','id');
        $brands= Brand::pluck('brand_name','id');
        return view('admin.products.create',compact('categories','brands'));
    }
    public function ajax(Request $request){
        $find= SubCategory::where('cat_id',$request->id)->get();
        $ut='<option value="">Select Subcategory</option>';
        foreach ($find as $f){
            $ut .= '<option value="'.$f->id.'">'.$f->name.'</option>' ;
        }
        return $ut;
    }


    public function store(ProductRequest $request)
    {
       $file = $request->file('image');
       $path= base_path()."/public/uploads/products/";
//       $path= base_path()."/public/uploads/products";
       $imageName= mb_substr(str_replace(" ","-",$request->title),0,70).".".$file->getClientOriginalExtension();
       $file->move($path,$imageName);

//        $imageName= mb_substr(str_replace(" ","-",$request->title),0,70).".".$file->getClientOriginalExtension();
//       $image_file= Image::make($file->getRealPath());
//        $image_file->resize(400, 264, function ($constraint) {
//            $constraint->aspectRatio();
//        })->save($path.'/'.$imageName);

//        $destinationPath = public_path('/uploads');
//        $image->move($destinationPath, $input['file']);


        $pro= new Product();
        $pro->user_id= Auth::id();
        $pro->cat_id = $request->cat_id;
        $pro->sub_cat_id= $request->sub_cat_id;
        $pro->brand_id= $request->brand_id;
        $pro->title= $request->title;
        $pro->details= $request->details;
        $pro->price= $request->price;
        $pro->qty= $request->qty;
        $pro->sku= $request->sku;
        $pro->image= $imageName;
        $pro->location= $request->location;
        $pro->created_at= Carbon::now();
        $pro->updated_at= null;
        $pro->save();


        return redirect()->to('dashboard/product')->with('success','products Successfully Added');
    }
    public function view($id){

        $product= Product::find($id)->with('category','brand','subcategory','user')->first();
        return view('admin/products/view',compact('product'));
    }


    public function edit($id)
    {
        $single_subcategory= SubCategory::find($id);
        $categories= Category::pluck('name','id');
        $brands= Brand::pluck('brand_name','id');
        $products= Product::find($id)->with('category','brand','subcategory','user')->first();
        return view('admin/products/edit',compact('single_subcategory','brands','categories','products'));
    }


    public function update(Request $request)
    {



        $image= $request->file('image');
        $old_image= Product::find($request->id)->image;

        if ($image == null){
            $request->validate([
                'cat_id'=>'required',
                'sub_cat_id'=>'required',
                'brand_id'=>'required',
                'title'=>'required',
                'details'=>'required',
                'price'=>'required| regex:$^[0-9]+.[0-9]+$',
                'qty'=>'required|integer',
                'sku'=>'required',
                'location'=>'required',
            ]);
        }else{
            $request->validate([
                'cat_id'=>'required',
                'sub_cat_id'=>'required',
                'brand_id'=>'required',
                'title'=>'required',
                'details'=>'required',
                'price'=>'required| regex:$^[0-9]+.[0-9]+$',
                'qty'=>'required|integer',
                'image'=>'required | mimes:jpg,bmp,png,svg,gif',
                'sku'=>'required',
                'location'=>'required',
            ]);
        }
        if ($image == null){
            $new_image= $old_image;
        }else{
            $old_image_path= base_path()."/public/uploads/products/".$old_image;
            unlink($old_image_path);
            $path= base_path()."/public/uploads/products";
            $new_image= mb_substr(str_replace(" ","-",$request->title),0,70).".".$image->getClientOriginalExtension();
            $image->move($path,$new_image);
        }

        $data= [
            'cat_id'=>$request->cat_id,
            'sub_cat_id'=>$request->sub_cat_id,
            'brand_id'=>$request->brand_id,
            'title'=>$request->title,
            'details'=>$request->details,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'sku'=>$request->sku,
            'image'=>$new_image,
            'location'=>$request->location,
            'updated_at'=>Carbon::now()
        ];
        Product::find($request->id)->update($data);
        return redirect()->to('dashboard/product')->with('success','Products Successfully Updated');
    }


    public function destroy($id)
    {
        Product::destroy($id);
        Thumbnail::where('product_id',$id)->delete();
        ProductAttribute::where('product_id',$id)->delete();
        return redirect()->to('dashboard/product')->with('success','Product Successfully Deleted');
    }
    public function deletedItems(){
        $products = Product::onlyTrashed()->with('category','brand','subcategory')->get();
        return view('admin/products/deleted',compact('products'));
    }
    public function restoreDeletedItems($id){
        Thumbnail::withTrashed()->where('product_id',$id)->update(['deleted_at'=>null]);
        ProductAttribute::withTrashed()->where('product_id',$id)->update(['deleted_at'=>null]);
        Product::withTrashed()->where('id',$id)->update(['deleted_at'=>null]);
        return redirect()->back()->with('success','SubCategory Successfully Restored');
    }
    public function forceDeletedItems($id){
        $thums= Thumbnail::withTrashed()->where('product_id',$id)->get();
        foreach ($thums as $t){
            $path= base_path('public/uploads/products/thumbnail/').$t->image;
            unlink($path);
        }
        Thumbnail::withTrashed()->where('product_id',$id)->forceDelete();
        ProductAttribute::withTrashed()->where('product_id',$id)->forceDelete();
        Product::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back()->with('success','SubCategory Permanently Deleted');
    }
}
