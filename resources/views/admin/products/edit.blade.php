@extends('layouts.admin')
@section('title')

@endsection
@section('style')

@endsection
@section('content')
    <div class="col-md-6 m-auto">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Category</h5>
                        <a href="{{url('dashboard/product')}}"  class="btn btn-primary m-b-md">View Category</a>
                        {!! Form::model($products, ['url' => 'dashboard/product/update','files'=>true]) !!}
                        <input type="hidden" name="id" value="{{$products->id}}">
                        @include('admin.products.form')
                        <button type="submit" class="btn btn-primary">Update</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#cat_id").on('change',function(){
                var id= $(this).val();
                var d= "{{url('/dashboard/product/create/ajax')}}";
                {{--alert(d);--}}
                {{--alert("{{url()}}");--}}
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: d,
                    method: 'post',
                    data: {id:id},
                    success:function(response){
                        console.log(response)
                        $('#sub_cat_id').html(response)
                    }
                });
            });
        });
    </script>
@endsection
