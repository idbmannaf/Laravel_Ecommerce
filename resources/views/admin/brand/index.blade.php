@extends('layouts.admin')
@section('title')
View Brand
@endsection
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Brand</h5>
                    <a href="{{url('dashboard/brand/create')}}"  class="btn btn-primary m-b-md">Add Brand</a>
                    <div id="zero-conf_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover">
                                    <thead class="bg-secondary">
                                        <tr role="row">
                                            <th>#id</th>
                                            <th>Image</th>
                                            <th>Brand Name</th>
                                            <th>Slug</th>
                                            <th>Created at</th>
                                            <th>Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($brands as $key=> $brand)
                                        <tr role="row" class="odd">
                                            <td width="10%">{{$brand->id}}</td>
                                            <td><img width="60px" height="60px" src="{{asset('uploads/brand/'.$brand->image)}}" alt=""></td>
                                            <td>{{$brand->brand_name}}</td>
                                            <td>{{$brand->slug}}</td>
                                            <td>{{$brand->created_at? \Carbon\Carbon::parse($brand->created_at)->format('Y/m/d'):''}}</td>
                                            <td>{{$brand->updated_at? \Carbon\Carbon::parse($brand->updated_at)->format('Y/m/d'):''}}</td>
                                            <td width="18%">
                                                <a class="btn btn-secondary" href="{{url('dashboard/brand/'.$brand->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-primary"onclick="return confirm('Are you sure you want to delete {{$brand->brand_name}} item?');" href="{{url('dashboard/brand/'.$brand->id.'/delete')}}"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr role="row" class="odd">
                                            <td colspan="6" class="text-danger"><h2>Brand Not Found</h2></td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1" >#id</th>
                                            <th rowspan="1" colspan="1">Brand</th>
                                            <th rowspan="1" colspan="1">Slug</th>
                                            <th rowspan="1" colspan="1" >Created</th>
                                            <th rowspan="1" colspan="1"  >Updated</th>
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
