@extends('layouts.admin')
@section('title')
View Products
@endsection
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <a href="{{url('dashboard/product/create')}}"  class="btn btn-primary m-b-md">Add products</a>
                    <div id="zero-conf_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table>
                                    <thead class="bg-secondary">
                                        <tr role="row">
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>price</th>
                                            <th>Qty</th>
                                            <th>Attr & Thumb</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $key=> $product)
                                        <tr role="row" class="even">
                                            <td width="15%"><img width="80px" src="{{asset('uploads/products/'.$product->image)}}" alt=""></td>
                                            <td width="35%">{{mb_substr($product->title,0,31)}}</td>
                                            <td width="8%">{{$product->price}}</td>
                                            <td width="8%">{{$product->qty}}</td>
                                            <td width="15%">
                                                <a style="padding: 1px 8px" href="{{url('dashboard/thumbnail/'.$product->id)}}" class=" btn-info"><i class="fas fa-image"></i></a>
                                                <a style="padding: 1px 8px" href="{{url('dashboard/attribute/'.$product->id)}}" class=" btn-success"><i class="fab fa-adn"></i></a>
                                            </td>
                                            <td width="18%">
                                                <a style="padding: 1px 8px" class="btn btn-success" href="{{url('dashboard/product/'.$product->id)}}"><i class="fas fa-eye"></i></a>
                                                <a style="padding: 1px 8px" class="btn btn-secondary" href="{{url('dashboard/product/'.$product->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                                                <a style="padding: 1px 8px" class="btn btn-danger"onclick="return confirm('Are you sure you want to delete {{$product->title}} item?');" href="{{url('dashboard/product/'.$product->id.'/delete')}}"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr role="row" class="odd">
                                            <td colspan="6" class="text-danger"><h2>Product Not Found</h2></td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                    <tfoot class="bg-secondary">
                                        <tr>
                                            <th rowspan="1" colspan="1" >Image</th>
                                            <th rowspan="1" colspan="1">Title</th>
                                            <th rowspan="1" colspan="1" >Price</th>
                                            <th rowspan="1" colspan="1"  >Quantity</th>
                                            <th rowspan="1" colspan="1">Attr & Tumb</th>
                                            <th rowspan="1" colspan="1" >Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
@endsection
