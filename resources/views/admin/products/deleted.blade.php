@extends('layouts.admin')
@section('title')
   Deleted Products
@endsection
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Deleted Products</h5>
                    <a href="{{url('dashboard/product')}}"  class="btn btn-primary m-b-md">View products</a>
                    <a href="{{url('dashboard/product/create')}}"  class="btn btn-secondary m-b-md">Add products</a>
                    <div id="zero-conf_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover">
                                    <thead class="bg-secondary">
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1"  style="width: 212px;">Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1"  style="width: 31px;">Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1"  style="width: 81px;">price</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1"  style="width: 78px;">Qty</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1"  style="width: 78px;">Attr & Thumb</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1"  style="width: 78px;">Action</th>
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
                                                <a style="padding: 1px 8px" href="#" class=" btn-info"><i class="fas fa-image"></i></a>
                                                <a style="padding: 1px 8px" href="#" class=" btn-success"><i class="fab fa-adn"></i></a>
                                            </td>
                                            <td width="18%">
                                                <a style="padding: 1px 8px" class="btn btn-success" href="{{url('dashboard/product/'.$product->id)}}"><i class="fas fa-eye"></i></a>
                                                <a style="padding: 1px 8px" class="btn btn-secondary"   href="{{url('dashboard/product/'.$product->id.'/restore')}}"><i class="fas fa-undo-alt"></i></a>
                                                <a style="padding: 1px 8px" class="btn btn-danger"onclick="return confirm('Are you sure you want to delete {{$product->title}} item?');" href="{{url('dashboard/product/'.$product->id.'/p-delete')}}"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr role="row" class="odd">
                                            <td colspan="6" class="text-danger"><h2>Deleted Product Not Found</h2></td>
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
