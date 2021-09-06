<div class="mb-3">
    <label for="cat_id" class="form-label">Category </label>
    {!! Form::select('cat_id',$categories, null, ['placeholder' => 'Select Category','class'=>'form-control','id'=>'cat_id']) !!}

    @error('cat_id')
    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="name" class="form-label">SubCategory</label>
    {!! Form::text('name',null,['class'=>'form-control','id'=>'name']) !!}
    @error('name')
    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
