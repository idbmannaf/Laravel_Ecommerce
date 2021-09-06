@extends('layouts.admin')
@section('title')
All Attributes
@endsection
@section('style')

@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-secondary text-center"><h4>All Attributes</h4></div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="bg-primary">
                <tr>
                    <th>Product Name</th>
                    <th>Attribute Name</th>
                    <th>Attribute Value</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($all_attributes as $att)
                    <tr>
                        <td>{{$att->product->title}}</td>
                        <td>{{$att->attribute_name}}</td>
                        <td>
                            @if(strpos($att->attribute_value,",") !=false)
                                <?php
                                $array= explode(",",$att->attribute_value);
                                ?>
                                @foreach($array as $val)
                                    <span class="badge bg-primary"> {{$val}}</span>
                                @endforeach
                            @else
                                {{$attri->attribute_value}}
                            @endif
                        </td>
                        <td>
                            <a  class="btn btn-danger"onclick="return confirm('Are you sure you want to delete {{$att->attribute_name}} item?');" href="{{url('dashboard/attribute/delete/'.$att->id)}}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-danger text-center">No Attribute Found</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
@endsection
