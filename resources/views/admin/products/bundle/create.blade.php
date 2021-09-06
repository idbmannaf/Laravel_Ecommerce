@extends('layouts.admin')
@section('title')
Create Bundle Products
@endsection
@section('style')

@endsection
@section('content')

    <div class="card">
        {{$products}}
        <div class="card-header bg-danger">Search</div>
        <select name="pid" id="pid">
            @forelse($products as $p)
            <option value="{{$p->id}}">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-fluid" src="{{asset('uploads/products/'.$p->image)}}" alt="">
                </div>
                <div class="col-md-3">
                    {{$p->title}}
                </div>
                <div class="col-md-3">
                    {{$p->sku}}
                </div>
                <div class="col-md-3">
                    {{$p->price}}
                </div>
            </div>
            </table>
            </option>

            @empty
                nai
            @endforelse
        </select>
    </div>
    <div class="card">
        <div class="card-header">Add Bundle Product</div>
        <div class="card-body">
            {!! Form::open(['url'=>'dashboard/bundle/store']) !!}
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="title">Title</label>
                    {!! Form::text('title',null,['class'=>'form-control','id'=>'title']) !!}
                    @error('title')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="price">Price</label>
                    {!! Form::text('price',null,['class'=>'form-control','id'=>'price']) !!}
                    @error('price')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="qty">Quantity</label>
                    {!! Form::text('qty',null,['class'=>'form-control','id'=>'qty']) !!}
                    @error('qty')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="sku">SKU</label>
                    {!! Form::text('sku',null,['class'=>'form-control','id'=>'sku']) !!}
                    @error('sku')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="details"></label>
                    {!! Form::text('details',null,['class'=>'form-control','id'=>'details']) !!}
                    @error('details')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
{{--                <div class="col-md-12 mb-3">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}

{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <table>--}}
{{--                                <tr>--}}
{{--                                    <th>Check</th>--}}
{{--                                    <th>Name</th>--}}
{{--                                    <th>Qty</th>--}}
{{--                                    <th>Price</th>--}}
{{--                                    <th>SKU</th>--}}
{{--                                    <th>Image</th>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <input type="checkbox"  name="items[]">--}}
{{--                                    </td>--}}
{{--                                    <td>product Tiltle</td>--}}
{{--                                    <td>product Quantity</td>--}}
{{--                                    <td>product Price</td>--}}
{{--                                    <td>product SKU</td>--}}
{{--                                    <td>product Image</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <input type="checkbox" name="items[]">--}}
{{--                                    </td>--}}
{{--                                    <td>product Tiltle</td>--}}
{{--                                    <td>product Quantity</td>--}}
{{--                                    <td>product Price</td>--}}
{{--                                    <td>product SKU</td>--}}
{{--                                    <td>product Image</td>--}}
{{--                                </tr>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <input type="search" id="search" name="query">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    <script>
    $(document).ready(function(){
       $("input#search").on("keyup",function (){
           val=$(this).val();

           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
              method:"POST",
              url:"{{url('dashboard/bundle/search')}}",
               data:{id:val},
               dataType:'json',
               success:function(response){
                console.log(response.table_data);
               }

           });
       });
    });
    </script>
@endsection
