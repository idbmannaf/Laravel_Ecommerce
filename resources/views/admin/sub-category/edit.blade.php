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
                        <h5 class="card-title">Edit Sub Category</h5>
                        <a href="{{url('dashboard/sub-category')}}"  class="btn btn-primary m-b-md">View SubCategory</a>
                        {!! Form::model($single_subcategory, ['url' => ['dashboard/sub-category/update']]) !!}
                        <input type="hidden" name="id" value="{{$single_subcategory->id}}">
                        @include('admin.sub-category.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
@endsection
