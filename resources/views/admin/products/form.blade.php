<div class="row">
    <div class="col-md-12 mb-3">
            <label for="title" class="form-label">Title</label>
            {!! Form::text('title',null,['class'=>'form-control','id'=>'title']) !!}
            @error('title')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
    </div>
    <div class="col-md-4">
        <label for="price" class="form-label">Price</label>
        {!! Form::text('price',null,['class'=>'form-control','id'=>'price','placeholder'=>'0.00']) !!}
        @error('price')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="qty" class="form-label">Quantity</label>
        {!! Form::text('qty',null,['class'=>'form-control','id'=>'qty']) !!}
        @error('qty')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label for="sku" class="form-label">Sku</label>
        {!! Form::text('sku',null,['class'=>'form-control','id'=>'sku']) !!}
        @error('sku')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label for="cat_id" class="form-label">Categories</label>
        {!! Form::select('cat_id',$categories, null, ['placeholder' => 'Select Category','class'=>'form-control','id'=>'cat_id']) !!}
        @error('cat_id')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label for="sub_cat_id" class="form-label">Sub Category</label>
        @if(isset($subcategories))
        {!! Form::select('sub_cat_id',$subcategories, null, ['placeholder' => 'Select sub-Category','class'=>'form-control','id'=>'sub_cat_id']) !!}
        @else
            <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                <option value="">first select Category</option>
            </select>
            @endif
        @error('sub_cat_id')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label for="brand_id" class="form-label">Categories</label>
        {!! Form::select('brand_id',$brands, null, ['placeholder' => 'Select Brand','class'=>'form-control','id'=>'brand_id']) !!}
        @error('brand_id')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>


    @if(Request::segment(4) == 'edit')
        <div class="col-md-12 mb-3">
            <label for="location" class="form-label">location</label>
            {!! Form::text('location',null,['class'=>'form-control','id'=>'location']) !!}
            @error('location')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-12 mb-3">
            <label for="image" class="form-label">image</label>
            <div style="width: 100px">
                <img class="img-fluid" src="{{asset('uploads/products/'.$products->image)}}" alt="">
            </div>
            {!! Form::file('image',['class'=>'form-control','id'=>'image']) !!}
            @error('image')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>

    @else
        <div class="col-md-6 mb-3">
            <label for="location" class="form-label">location</label>
            {!! Form::text('location',null,['class'=>'form-control','id'=>'location']) !!}
            @error('location')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="image" class="form-label">image</label>
            {!! Form::file('image',['class'=>'form-control','id'=>'image']) !!}
            @error('image')
            <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
    @endif
    <div class="col-md-12 mb-3">
        <label for="details" class="form-label">Product Details</label>
        <textarea name="details" id="details" cols="30" rows="10" class="form-control">
            @if(isset($products->details))
                {{$products->details}}
            @else

            @endif
        </textarea>
        @error('details')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>

</div>

