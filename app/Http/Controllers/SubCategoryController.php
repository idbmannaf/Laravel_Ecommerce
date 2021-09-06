<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
//        $subcategories= SubCategory::orderBy('id','DESC')->get();\
        $subcategories= SubCategory::with('category')->orderBy('id',"DESC")->get();
//       dd($subcategories);
        return view('admin.sub-category.index',compact('subcategories'));
    }


    public function create()
    {
        $categories= Category::pluck('name','id');
        return view('admin.sub-category.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $validation= $request->validate([
            'name'=>'required|unique:categories',
            'cat_id'=>'required',
        ]);
        $category= new Category();
        $subcategories= new SubCategory();
        $subcategories->cat_id= $request->cat_id;
        $subcategories->name= $request->name;
        $subcategories->created_at= Carbon::now();
        $subcategories->save();
        return redirect()->to('dashboard/sub-category')->with('success','Sub-Category Successfully Added');
    }


    public function edit($id)
    {
        $single_subcategory= SubCategory::find($id);
            $categories= Category::pluck('name','id');
        return view('admin/sub-category/edit',compact('single_subcategory','categories'));
    }


    public function update(Request $request)
    {
        $validation= $request->validate([
            'name'=>'required',
            'cat_id'=>'required',
        ]);
        SubCategory::find($request->id)->update($request->except(['_token','id']));
        return redirect()->to('dashboard/sub-category')->with('success','Sub Category Successfully Updated');
    }


    public function destroy($id)
    {
        SubCategory::destroy($id);
        return redirect()->to('dashboard/sub-category')->with('success','SubCategory Successfully Deleted');
    }
    public function deletedCat(){
        $subcategories= SubCategory::onlyTrashed()->get();
        return view('admin/sub-category/deleted',compact('subcategories'));
    }
    public function restoreDeletedItems($id){

        SubCategory::withTrashed()->where('id',$id)->update(['deleted_at'=>null]);
        return redirect()->back()->with('success','SubCategory Successfully Restored');
    }
    public function forceDeletedItems($id){
        SubCategory::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back()->with('success','SubCategory Permanently Deleted');
    }
}
