@extends('layouts.admin')
@section('title')
    Deleted Brand
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero-conf">#id</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf">Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf">Slug</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf">Deleted</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero-conf" >Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($brands as $key=> $brand)
                                        <tr role="row" class="odd">
                                            <td width="10%">{{$brand->id}}</td>
                                            <td><img width="60px" height="60px" src="{{asset('uploads/brand/'.$brand->image)}}" alt=""></td>
                                            <td>{{$brand->brand_name}}</td>
                                            <td>{{$brand->slug}}</td>
                                            <td>{{$brand->deleted_at? \Carbon\Carbon::parse($brand->deleted_at)->format('Y/m/d'):''}}</td>
                                            <td width="18%">
                                                <a class="btn btn-secondary"  href="{{url('dashboard/brand/'.$brand->id.'/restore')}}"><i class="fas fa-undo-alt"></i></a>
                                                <a class="btn btn-primary" onclick="return confirm('Are you sure you want to permanent delete {{$brand->name}} item?');" href="{{url('dashboard/brand/'.$brand->id.'/f-delete')}}"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr role="row" class="odd">
                                            <td colspan="6" class="text-danger"><h2>Band Not Found</h2></td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1" >#id</th>
                                        <th rowspan="1" colspan="1">Image</th>
                                        <th rowspan="1" colspan="1" >Name</th>
                                        <th rowspan="1" colspan="1"  >Slug</th>
                                        <th rowspan="1" colspan="1">Deleted</th>
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
