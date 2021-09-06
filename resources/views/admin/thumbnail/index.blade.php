@extends('layouts.admin')
@section('title')
Thumbnails Of all Products
@endsection
@section('style')

@endsection
@section('content')

    <div class="card">
        <div class="card-header text-center bg-secondary"><h4>All Thumbnails With Products</h4></div>
        <div class="card-body">
            <table class="table table-hover">
               <thead>
               <tr>
                   <th>P Id</th>
                   <th>Product Name</th>
                   <th>Thumbnail</th>
                   <th>Action</th>
               </tr>
               </thead>
                <tbody>
                @forelse($thumb_with_product as $tp)
                    <tr>
                        <td>{{$tp->id}}</td>
                        <td>{{$tp->product->title}}</td>
                        <td>
                            <a data-lightbox="{{$tp->id}}" href="{{asset('uploads/products/thumbnail/'.$tp->image)}}"><img class="img-fluid lazy" data-src="{{asset('uploads/products/thumbnail/'.$tp->image)}}" src="{{asset('uploads/products/thumbnail/'.$tp->image)}}"/></a>

                        </td>
                        <td>
                            <a class="btn btn-danger" id="close" data-thumb="{{$tp->id}}" href="#"><i class="fas fa-trash"></i></a>
{{--                            <a  id="close" data-thumb="{{$tp->id}}" class=" shadow" href="#"><i class="fas fa-times-circle"></i></a>--}}

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Thumbnail Not Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function (){
            $("a#close").on('click',function (event){
                event.preventDefault();
                if (confirm('Are you sure you want to delete This Thumbnail?') == true) {
                    var thumb_id = $(this).attr('data-thumb');
                    // alert(thumb_id);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('dashboard/thumbnail/delete')}}",
                        method: 'POST',
                        data: {id: thumb_id},
                        success: function (response) {

                            if (response == "done"){
                                location.reload()
                            }
                            toastr["success"]("Thumbnail Successfully Deleted!")
                        }
                    });
                }
            });
        });
    </script>
@endsection
