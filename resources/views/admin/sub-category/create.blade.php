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
                        <h5 class="card-title">Create Category</h5>
                        {!! Form::open(['url' => 'dashboard/sub-category/store','method'=>'POST']) !!}
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
