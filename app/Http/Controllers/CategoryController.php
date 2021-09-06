<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class CategoryController extends Controller
{

    public function index()
    {
        $categories= Category::orderBy('id','DESC')->get();
     return view('admin.category.index',compact('categories'));
    }


    public function create()
    {

      return view('admin.category.create');
    }


    public function store(Request $request)
    {
       $validation= $request->validate([
           'name'=>'required|unique:categories'
       ]);
       $data= [
           'name'=>$request->name,
           'created_at'=>Carbon::now()
       ];
       $categories= new Category();
       $categories->name= $request->name;
       $categories->created_at= Carbon::now();
       $categories->save();
       return redirect()->to('dashboard/category')->with('success','Category Successfully Added');
    }


    public function edit($id)
    {
        $single_category= Category::find($id);
        return view('admin/category/edit',compact('single_category'));
    }


    public function update(Request $request)
    {
        $validation= $request->validate([
            'name'=>'required|unique:categories'
        ]);
        Category::find($request->id)->update($request->except(['_token','id']));
        return redirect()->to('dashboard/category')->with('success','Category Successfully Updated');
    }



    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->to('dashboard/category')->with('success','Category Successfully Deleted');
    }
    public function deletedCat(){
        $categories= Category::onlyTrashed()->get();
       return view('admin/category/deleted',compact('categories'));
    }
    public function restoreDeletedItems($id){

        Category::withTrashed()->where('id',$id)->update(['deleted_at'=>null]);
        return redirect()->back()->with('success','Category Successfully Restored');
    }
    public function forceDeletedItems($id){
        Category::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back()->with('success','Category Permanently Deleted');
    }
}
