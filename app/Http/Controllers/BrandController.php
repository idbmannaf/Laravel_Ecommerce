<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\brand;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use Intervention\Image\Image;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        $brands= Brand::orderBy('id','DESC')->get();
        return view('admin.brand.index',compact('brands'));
    }


    public function create()
    {
        return view('admin.brand.create');
    }


    public function store(BrandRequest $request)
    {
        $image= $request->file('image');
        $path= base_path()."/public/uploads/brand";
        $imageName= str_replace(" ","-",strtolower($request->brand_name)).".".$image->getClientOriginalExtension();
$image->move($path,$imageName);
//        $image_resize=Image::make($image->getRealPath());
//        $image_resize->resize(400,400);
//        $image_resize->save($path."/".$imageName);
        $brand= new Brand();
        $brand->brand_name= $request->brand_name;
        $brand->image= $imageName;
        $brand->created_at= Carbon::now();
        $brand->updated_at= null;
        $brand->save();
        return redirect()->to('dashboard/brand')->with('success','Brand Successfully Added');
    }


    public function edit($id)
    {
        $single_brand= Brand::find($id);
        return view('admin/brand/edit',compact('single_brand'));
    }


    public function update(Request $request)
    {
        $image= $request->file('image');
        $oldimage= Brand::find($request->id)->image;
        if ($image == null){
            $newimage=$oldimage;
        }else{
            $old_image_path= base_path()."/public/uploads/brand/".$oldimage;
            unlink($old_image_path);
            $path= base_path()."/public/uploads/brand";
            $imageName= str_replace(" ","-",strtolower($request->brand_name)).".".$image->getClientOriginalExtension();
            $image->move($path,$imageName);
        }
        $data= [
            'brand_name'=>$request->brand_name,
            'image'=>$imageName
        ];
        Brand::find($request->id)->update($data);
        return redirect()->to('dashboard/brand')->with('success','Brand Successfully Updated');
    }



    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect()->to('dashboard/brand')->with('success','brand Successfully Deleted');
    }
    public function deletedItems(){
        $brands= Brand::onlyTrashed()->get();
        return view('admin/brand/deleted',compact('brands'));
    }
    public function restoreDeletedItems($id){

        Brand::withTrashed()->where('id',$id)->update(['deleted_at'=>null]);
        return redirect()->back()->with('success','brand Successfully Restored');
    }
    public function forceDeletedItems($id){
        $image= Brand::withTrashed()->where('id',$id)->first()->image;
        if ($image !=null){
            $old_image_path= base_path()."/public/uploads/brand/".$image;
            unlink($old_image_path);
            Brand::withTrashed()->where('id',$id)->forceDelete();
            return redirect()->back()->with('success','brand Permanently Deleted');
        }else{
            Brand::withTrashed()->where('id',$id)->forceDelete();
            return redirect()->back()->with('success','brand Permanently Deleted');
        }
    }
    public function component(){
        return view('component');
    }

}
