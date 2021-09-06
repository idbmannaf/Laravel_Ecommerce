@extends('layouts.admin')
@section('title')
View Categories
@endsection
@section('style')

@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <a href="{{url('dashboard/category/create')}}"  class="btn btn-primary m-b-md">Add Category</a>
                    <div id="zero-conf_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover">
                                    <thead class="bg-secondary">
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">#id</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 212px;">Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">Created at</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 81px;">Updated</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 78px;">Deleted</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero-conf" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 78px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($categories as $key=> $category)
                                        <tr role="row" class="odd">
                                            <td width="10%">{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->created_at? \Carbon\Carbon::parse($category->created_at)->format('Y/m/d'):''}}</td>
                                            <td>{{$category->updated_at? \Carbon\Carbon::parse($category->updated_at)->format('Y/m/d'):''}}</td>
                                            <td>{{$category->deleted_at? \Carbon\Carbon::parse($category->deleted_at)->format('Y/m/d'):''}}</td>
                                            <td width="18%">
                                                <a class="btn btn-secondary" href="{{url('dashboard/category/'.$category->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-primary"onclick="return confirm('Are you sure you want to delete {{$category->name}} item?');" href="{{url('dashboard/category/'.$category->id.'/delete')}}"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr role="row" class="odd">
                                            <td colspan="6" class="text-danger"><h2>Category Not Found</h2></td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1" >#id</th>
                                            <th rowspan="1" colspan="1">Category</th>
                                            <th rowspan="1" colspan="1" >Created</th>
                                            <th rowspan="1" colspan="1"  >Updated</th>
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
