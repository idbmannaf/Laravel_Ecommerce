<div class="mb-3">
    <label for="name" class="form-label">Category Name</label>
    {!! Form::text('name',null,['class'=>'form-control','id'=>'name']) !!}
    @error('name')
    <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
