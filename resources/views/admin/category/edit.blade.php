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
                        <a href="{{url('dashboard/category')}}"  class="btn btn-primary m-b-md">View Category</a>
                        {!! Form::model($single_category, ['url' => ['dashboard/category/update']]) !!}
                        <input type="hidden" name="id" value="{{$single_category->id}}">
                        @include('admin.category.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
@endsection
