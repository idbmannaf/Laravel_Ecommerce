@extends('layouts.admin')
@section('title')

@endsection
@section('style')

@endsection
@section('content')
    <div class="card w-50 m-auto">
        <div class="card-header bg-secondary text-center">
            <h3>Add Thumbnails</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['url'=>'dashboard/thumbnail/add','files'=>true]) !!}
            <input type="hidden" name="id" value="{{Request::segment(3)}}">
            <label for="image" class="form-label">Image</label>
            {!! Form::file('image[]',['multiple','id'=>'image','class'=>'form-control']) !!}
            @error('image')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
            <button type="submit" class="btn btn-primary my-3">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header bg-secondary text-center"> <h4>Product Thumbnail</h4> </div>
        <div class="card-body">
            <div class="row">
                @forelse($thumbnails as $thumb)
                    <div class="col-md-4 p-2">
                        <div style="position:relative;">
                            <a  id="close" data-thumb="{{$thumb->id}}" class="AClass shadow" href="#"><i class="fas fa-times-circle"></i></a>
                            <a data-lightbox="{{$thumb->id}}" href="{{asset('uploads/products/thumbnail/'.$thumb->image)}}"><img class="img-fluid lazy" data-src="{{asset('uploads/products/thumbnail/'.$thumb->image)}}" src="{{asset('uploads/products/thumbnail/'.$thumb->image)}}"/></a>
                        </div>
                    </div>
                @empty
                    <h2 class="text-danger">No Thumbnail Found In this Product</h2>
                @endforelse

            </div>

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
