@extends('layouts.front')
@section('title')
Dynamic Store -
@endsection
@section('style')

@endsection
@section('content')
    <div class="container">
        <div class="ps-section__header text-center p-5 mb-3">
            <h3>Category list</h3>
        </div>
        <div class="ps-layout--shop">
            <div class="ps-layout__left">
                <aside class="widget widget_shop">
                    <h4 class="widget-title">Categories</h4>
                    <ul class="ps-list--categories">
                        @foreach($categories_all as $cat)

                            <li class="menu-item-has-children"><a href="{{url('category/'.$cat->slug)}}">{{$cat->name}}</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu" style="display: none;">
                                    <?php
                                    $subcategories_list= \App\Models\SubCategory::where('cat_id',$cat->id)->get();
                                    ?>
                                        @forelse($subcategories_list as $subcat)
                                            <li>
                                                <a href="{{url('subcategory/'.$subcat->slug)}}">{{$subcat->name}}</a>
                                            </li>
                                        @empty

                                        @endforelse

                                </ul>
                            </li>

                        @endforeach
                    </ul>
                </aside>

            </div>

            <div class="ps-layout__right">
                <div class="ps-shopping ps-tab-root">
                    <div class="ps-shopping__header">
                        <p><strong> {{count($products_all)}}</strong> Products found</p>
                        <div class="ps-shopping__actions">
                            <select class="ps-select select2-hidden-accessible" data-placeholder="Sort Items" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                <option data-select2-id="6">Sort by latest</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by price: low to high</option>
                                <option>Sort by price: high to low</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 198px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ciig-container"><span class="select2-selection__rendered" id="select2-ciig-container" role="textbox" aria-readonly="true" title="Sort by latest">Sort by latest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            <div class="ps-shopping__view">
                                <p>View</p>
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                    <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="tab-1">
                            <div class="ps-shopping-product">
                                <div class="row">
                                    @forelse($products_all as $product)
                                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                        <div class="ps-product">
                                            <div class="ps-product__thumbnail">
                                                <a href="{{'product/'.$product->slug}}">
                                                    <img src="{{asset('uploads/products/'.$product->image)}}" alt="">
                                                </a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="{{route('add.cart',['slug'=>$product->slug])}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                    <li><a href="{{route('add.wishlist',['slug'=>$product->slug])}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__container"><a class="ps-product__vendor" href="{{url('brand/'.$product->brand->slug)}}">Brand: {{$product->brand->brand_name}}</a>
                                                <div class="ps-product__content">
                                                    <a class="ps-product__title" href="{{asset('product/'.$product->slug)}}">{{$product->title}}</a>
                                                    <p class="ps-product__price">${{$product->price}}</p>
                                                </div>
                                                <div class="ps-product__content hover">
                                                    <a class="ps-product__title" href="{{asset('product/'.$product->slug)}}">{{$product->title}}</a>
                                                    <p class="ps-product__price">${{$product->price}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="ps-pagination">
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ps-tab" id="tab-2">
                            <div class="ps-shopping-product">
                                @forelse($products_all as $product)
                                <div class="ps-product ps-product--wide">
                                    <div class="ps-product__thumbnail">
                                        <a href="{{url('product/'.$product->slug)}}">
                                            <img src="{{asset('uploads/products/'.$product->image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="ps-product__container">
                                        <div class="ps-product__content">
                                            <a class="ps-product__title" href="{{url('product/'.$product->slug)}}">{{$product->title}}</a>
                                            <p class="ps-product__vendor">Specification</p>
                                            <ul class="ps-product__desc">
                                                @php
                                                $attributes= \App\Models\ProductAttribute::where('product_id',$product->id)->get()->take(5);
                                                @endphp
                                                @forelse($attributes as $attr)
                                                <li>{{$attr->attribute_name}} : &nbsp; {{$attr->attribute_value}}</li>
                                                @empty
                                                    <li class="text-danger">No Attributes Found</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                        <div class="ps-product__shopping">
                                            <p class="ps-product__price">{{$product->price}}</p>
                                            <a class="ps-btn" href="{{route('add.cart',['slug'=>$product->slug])}}">Add to cart</a>
                                            <ul class="ps-product__actions">
                                                <li><a href="{{route('add.wishlist',['slug'=>$product->slug])}}"><i class="icon-heart"></i> Wishlist</a></li>
                                                <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    @endforelse
                            </div>
                            <div class="ps-pagination">
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

@endsection
