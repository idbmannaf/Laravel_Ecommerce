<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Thumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThumbnailController extends Controller
{
    public function index(){
        $thumb_with_product= Thumbnail::with('product')->get();
        return view('admin.thumbnail.index',compact('thumb_with_product'));
    }

    public function view($id){
       $thumbnails= Thumbnail::where('product_id',$id)->get();
        return view('admin.products.productthumb',compact('thumbnails'));
    }

    public function add(Request $request){
       $product_title=mb_substr(str_replace(" ","-",Product::find($request->id)->title),0,40);
       $validation= $request->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,gif'
        ]);
        try {
            foreach ($request->image as $file){
            $image_name= $product_title.Str::random(5).".".$file->getClientOriginalExtension();
            $path= base_path()."/public/uploads/products/thumbnail/";
            $file->move($path,$image_name);
            $thumbnail= new Thumbnail();
            $thumbnail->product_id= $request->id;
            $thumbnail->image= $image_name;
            $thumbnail->created_at= Carbon::now();
            $thumbnail->save();
        }
            return redirect()->back()->with('success',"Product Image Successfully Uploaded");

        }catch (\Exception $e){

            return redirect()->back()->with('fail',"Something Wong");
        }
    }
    public function destroy(Request $request){
        $image= Thumbnail::find($request->id)->image;
        $path= base_path('public/uploads/products/thumbnail/').$image;
        unlink($path);
        Thumbnail::where('id',$request->id)->forceDelete();
       return "done";
    }
}
