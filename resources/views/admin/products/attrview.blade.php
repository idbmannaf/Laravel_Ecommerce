@extends('layouts.admin')
@section('title')

@endsection
@section('style')

@endsection
@section('content')
    <div class="card w-50 m-auto">
        <div class="card-header bg-secondary text-center">
            <h3>Product Attributes</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['url'=>'dashboard/attribute/add']) !!}
            <input type="hidden" name="product_id" id="product_id" value="{{Request::segment(3)}}">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="attribute_name">Attribute Name</label>
                    {!! Form::text('attribute_name',null,['id'=>'attribute_name','class'=>'form-control']) !!}
                    @error('attribute_name')
                    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <label for="attribute_value">Value</label>
                    {!! Form::text('attribute_value',null,['id'=>'attribute_value','class'=>'form-control']) !!}
                    @error('attribute_value')
                    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" id="attsubmit" class="btn btn-primary my-3">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header bg-secondary text-center"> <h4>Product Attribute</h4> </div>
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered">
                    <thead class="bg-secondary">
                    <tr>
                        <th>Attribute Name</th>
                        <th>Attribute Value</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @forelse($attribute as $attri)
                            <tr>
                                <th>{{$attri->attribute_name}}</th>
                                <td>
                                    @if(strpos($attri->attribute_value,",") !=false)
                                        <?php
                                            $array= explode(",",$attri->attribute_value);
                                        ?>
                                        @foreach($array as $val)
                                           <span class="badge bg-primary"> {{$val}}</span>
                                            @endforeach
                                    @else
                                  {{$attri->attribute_value}}
                                        @endif
                                </td>
                                <td>
                                    <a  class="btn btn-danger"onclick="return confirm('Are you sure you want to delete {{$attri->attribute_name}} item?');" href="{{url('dashboard/attribute/delete/'.$attri->id)}}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                    @empty
                    Not Found
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            var success=false;--}}
{{--            $('#attribute_name').keyup(function (){--}}
{{--                var attribute_name= $(this).val();--}}
{{--                if (attribute_name.length >0){--}}
{{--                    $("#attribute_value").attr("required","required");--}}
{{--                    $("#attribute_value").removeAttr("disabled");--}}
{{--                    $("#attribute_value").addClass('req');--}}
{{--                    success=true--}}
{{--                        $("#attribute_value").keyup(function (){--}}
{{--                            var attr1val=   $("#attribute_value").val();--}}
{{--                            if (attr1val.length <1){--}}
{{--                                $("#attribute_value").addClass('req');--}}
{{--                            }else {--}}
{{--                                $("#attribute_value").removeClass('req');--}}
{{--                            }--}}
{{--                        });--}}
{{--                }else {--}}
{{--                    $("#attribute_value").removeAttr("required","required");--}}
{{--                    $("#attribute_value").attr("disabled","disabled");--}}
{{--                    $("#attribute_value").val("");--}}
{{--                    $("#attribute_value").removeClass('req');--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}
@endsection
