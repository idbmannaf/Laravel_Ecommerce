@extends('layouts.admin')
@section('title')
{{$product->title}}
@endsection
@section('style')

@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-secondary d-flex justify-content-between">
            <a class="btn btn-primary" href="{{url('dashboard/product')}}"><i class="fas fa-chevron-left"></i></a>
            <h2>{{$product->title}}</h2>
             <p>added by <b>{{$product->user->name}}</b></p>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <td colspan="2" class="text-center">
                        <img class="" width="500px" src="{{asset('uploads/products/'.$product->image)}}" alt="">
                    </td>
                </tr>
                <tr>
                    <th><b>Title:</b></th>
                    <td>{{$product->title}}</td>
                </tr>
                <tr>
                    <th><b>Category:</b></th>
                    <td>{{$product->category->name}}</td>
                </tr>
                <tr>
                    <th><b>Sub Category:</b></th>
                    <td>{{$product->subcategory->name}}</td>
                </tr>
                <tr>
                    <th><b>Brand name:</b></th>
                    <td>{{$product->brand->brand_name}}</td>
                </tr>
                <tr>
                    <th><b>Price:</b></th>
                    <td>{{$product->price}}</td>
                </tr><tr>
                    <th><b>Quantity:</b></th>
                    <td>{{$product->qty}}</td>
                </tr>
                <tr>
                    <th><b>SKU:</b></th>
                    <td>{{$product->sku}}</td>
                </tr>
                <tr>
                    <th><b>Location:</b></th>
                    <td>{{$product->location}}</td>
                </tr>
                <tr>
                    <th><b>Slug:</b></th>
                    <td>{{$product->slug}}</td>
                </tr>
                <tr>
                    <th><b>Description:</b></th>
                    <td>{{$product->details}}</td>
                </tr>
                <tr>
                    <td>Created At: <b>{{$product->created_at? \Carbon\Carbon::parse($product->created_at)->format('Y/m/d'):''}}</b></td>
                    <td colspan="2">
                        Author: <b>{{$product->user->name}}</b>
                    </td>
                </tr>


            </table>
        </div>
    </div>
@endsection
@section('script')
@endsection
