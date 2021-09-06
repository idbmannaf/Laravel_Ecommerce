<div class="mb-3">
    <label for="brand_name" class="form-label">Brand Name</label>
    {!! Form::text('brand_name',null,['class'=>'form-control','id'=>'name']) !!}
    @error('brand_name')
    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="image" class="form-label">Brand Image</label>
    @if(isset($single_brand))
        <div style="width: 120px; height: 120px; overflow: hidden">
            <img class="img-fluid" src="{{asset('uploads/brand/'.$single_brand->image)}}" alt="">
        </div>
    @else

        @endif
    {!! Form::file('image',['class'=>'form-control','id'=>'image']) !!}
    @error('image')
    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
