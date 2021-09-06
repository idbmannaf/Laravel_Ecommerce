@extends('layouts.front')
@section('title')
Dynamic Store - {{$single->title}}
@endsection
@section('style')

@endsection
@section('content')
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="{{url("/")}}">Home</a></li>
                <li><a href="{{url('category/'.$single->category->slug)}}">{{$single->category->name}}</a></li>
                <li><a href="{{url('subcategory/'.$single->subcategory->slug)}}">{{$single->subcategory->name}}</a></li>
                <li>{{$single->title}}</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--product ps-page--product-box">
        <div class="container">
            <div class="ps-product--detail ps-product--box">
                <div class="ps-product__header ps-product__box">
                    <div class="ps-product__thumbnail" data-vertical="true">
                        <figure>
                            <div class="ps-wrapper">
                                <div class="ps-product__gallery slick-initialized slick-slider" data-arrow="true"><a href="#" class="slick-arrow slick-disabled" aria-disabled="true" style=""><i class="fas fa-angle-left"></i></a>
                                    <div aria-live="polite" class="slick-list draggable">
                                        <div class="slick-track" role="listbox" style="opacity: 1; width: 1287px;">
                                            @php
                                            $thumnails= \App\Models\Thumbnail::where('product_id',$single->id)->get();
                                            $serial= 0;
                                            @endphp
                                            @foreach($thumnails as $thumb)
                                                <div class="item slick-slide slick-current slick-active" data-slick-index="{{$serial++}}" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide{{$serial++}}" style="width: 429px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                                    <a href="{{asset('uploads/products/thumbnail/'.$thumb->image)}}" tabindex="0">
                                                        <img src="{{asset('uploads/products/thumbnail/'.$thumb->image)}}" alt="">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <a href="#" class="slick-arrow" style="" aria-disabled="false"><i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </figure>
                        <div class="ps-product__variants slick-initialized slick-slider slick-vertical" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                            <div aria-live="polite" class="slick-list draggable" style="height: 280px;">
                                <div class="slick-track" role="listbox" style="opacity: 1; height: 280px; transform: translate3d(0px, 0px, 0px);">

                                    @php
                                        $thumnails= \App\Models\Thumbnail::where('product_id',$single->id)->get();
                                        $serial= 0;
                                    @endphp
                                    @foreach($thumnails as $thumb)
                                    <div class="item slick-slide slick-current slick-active" data-slick-index="{{$serial++}}" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide{{$serial++}}" style="width: 60px;">
                                        <img src="{{asset('uploads/products/thumbnail/'.$thumb->image)}}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="ps-product__info">
                        <h1>{{$single->title}}</h1>
                        <div class="ps-product__meta">
                            <p>Brand:<a href="{{url('brand/'.$single->brand->slug)}}">{{$single->brand->brand_name}}</a></p>
                        </div>
                        <h4 class="ps-product__price">${{$single->price}}</h4>
                        <div class="ps-product__desc">
                            <p>Status:
                                @if($single->qty <1)
                                    a href="#"><strong class="ps-tag--out-stock">Out of stock</strong></a>
                                @else
                                    <a href="#"><strong class="text-success">In stock</strong></a>
                                    @endif
                            </p>
                        </div>
                        <div class="ps-product__shopping">
                            <figure>
                                <figcaption>Quantity</figcaption>
                                <div class="form-group--number">
                                    <button class="up"><i class="fas fa-plus"></i></button>
                                    <button class="down"><i class="fas fa-minus"></i></button>
                                    <input class="form-control" type="text" placeholder="1">
                                </div>
                            </figure>
                            @if($single->qty <1)
                               <strong class="ps-tag--out-stock">Out of stock</strong>
                            @else
                                <a class="ps-btn ps-btn--black" href="{{url('/cart')}}">Add to cart</a>
                                <a class="ps-btn" href="#">Buy Now</a>
                            @endif


                            <div class="ps-product__actions">
                                <a href="#"><i class="icon-heart"></i></a>
                                <a href="#"><i class="icon-chart-bars"></i></a>
                            </div>
                        </div>
                        <div class="ps-product__specification"><a class="report" href="#">Report Abuse</a>
                            <p><strong>SKU:</strong> {{$single->sku}}</p>
                            <p class="categories">
                                <strong> Categories:</strong>
                            <a href="{{url('category/'.$single->category->slug)}}">{{$single->category->name}}</a>,
                            <a href="{{url('subcategory/'.$single->subcategory->slug)}}">{{$single->subcategory->name}}</a>
                            </p>
                        </div>
                        <div class="ps-product__sharing">
                            <a  target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?u={{url()->full()}}"><i class="fab fa-facebook-square"></i></a>
                            <a  target="_blank" class="twitter" href="https://twitter.com/share?url={{url()->full()}}&text={{$single->title}}&via={{$single->category->name}}&hashtags={{$single->subcategory->name}}"><i class="fab fa-twitter"></i></a>
                            <a  target="_blank" class="linkedin" href="https://www.linkedin.com/shareArticle?url={{url()->full()}}&title={{$single->title}}"><i class="fab fa-linkedin"></i></a>
                            <a  target="_blank" class="linkedin" href="https://pinterest.com/pin/create/bookmarklet/?media={{asset('uploads/products/'.$single->image)}}]&url={{url()->full()}}&is_video={{$single->image}}]&description={{$single->title}}"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="ps-product__content ps-tab-root">
                    <div class="row">
                        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-product__box">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Description</a></li>
                                    <li class=""><a href="#tab-2">Specification</a></li>
                                    <li class=""><a href="#tab-4">Reviews (1)</a></li>
                                    <li><a href="#tab-5">Questions and Answers</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            <p>{{$single->details}}</p>
                                            </div>
                                    </div>
                                    <div class="ps-tab" id="tab-2">
                                        <div class="table-responsive">
                                            <table class="table table-bordered ps-table ps-table--specification">
                                                <tbody>
                                                @php
                                                $attributes= \App\Models\ProductAttribute::where('product_id',$single->id)->get();
                                                @endphp
                                                @forelse($attributes as $attr)
                                                    <tr>
                                                        <td>{{$attr->attribute_name}}</td>
                                                        <td>{{$attr->attribute_value}}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2" class="text-danger text-center">No Attribute Found in this Product</td>
                                                    </tr>
                                                @endforelse


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-4">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                                                <div class="ps-block--average-rating">
                                                    <div class="ps-block__header">
                                                        <h3>4.00</h3>
                                                        <div class="br-wrapper br-theme-fontawesome-stars">
                                                            <select class="ps-rating" data-read-only="true" style="display: none;">
                                                                <option value="1">1</option>
                                                                <option value="1">2</option>
                                                                <option value="1">3</option>
                                                                <option value="1">4</option>
                                                                <option value="2">5</option>
                                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>1 Review</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>5 Star</span>
                                                        <div class="ps-progress" data-value="100"><span style="width: 100%;"></span></div><span>100%</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>4 Star</span>
                                                        <div class="ps-progress" data-value="0"><span style="width: 0%;"></span></div><span>0</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>3 Star</span>
                                                        <div class="ps-progress" data-value="0"><span style="width: 0%;"></span></div><span>0</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>2 Star</span>
                                                        <div class="ps-progress" data-value="0"><span style="width: 0%;"></span></div><span>0</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>1 Star</span>
                                                        <div class="ps-progress" data-value="0"><span style="width: 0%;"></span></div><span>0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                                <form class="ps-form--review" action="index.html" method="get">
                                                    <h4>Submit Your Review</h4>
                                                    <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
                                                    <div class="form-group form-group__rating">
                                                        <label>Your rating of this product</label>
                                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="false" style="display: none;">
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select><div class="br-widget"><a href="#" data-rating-value="1" data-rating-text="1"></a><a href="#" data-rating-value="2" data-rating-text="2"></a><a href="#" data-rating-value="3" data-rating-text="3"></a><a href="#" data-rating-value="4" data-rating-text="4"></a><a href="#" data-rating-value="5" data-rating-text="5"></a><div class="br-current-rating"></div></div></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="6" placeholder="Write your review here"></textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" placeholder="Your Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                            <div class="form-group">
                                                                <input class="form-control" type="email" placeholder="Your Email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group submit">
                                                        <button class="ps-btn">Submit Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-5">
                                        <div class="ps-block--questions-answers">
                                            <h3>Questions and Answers</h3>
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Have a question? Search for answer?">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-6">
                                        <p>Sorry no more offers available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-product__box">
                                <aside class="widget widget_same-brand">
                                    <h3>Same Brand</h3>
                                    <div class="widget__content">
                                        @php
                                       $brands_product= \App\Models\Product::all()->where('brand_id',$single->brand->id)->take(5)->except($single->id);
                                        @endphp
                                        @foreach($brands_product as $b_product)
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail">
                                                    <a href="{{url('product/'.$b_product->slug)}}"><img src="{{asset('uploads/products/'.$b_product->image)}}" alt="{{$b_product->title}}"></a>
{{--                                                    <div class="ps-product__badge">-37%</div>--}}
                                                    <ul class="ps-product__actions">
                                                        <li><a href="{{url('/cart')}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                                        <li><a href="{{url('/wishlist')}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container">
                                                    <div class="ps-product__content">
                                                        <a class="ps-product__title" href="{{url('product/'.$b_product->slug)}}">{{$b_product->title}}</a>
                                                        <p class="ps-product__price sale">{{$b_product->price}}</p>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>Related products</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider owl-carousel owl-loaded owl-drag" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">

                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-2214px, 0px, 0px); transition: all 1s ease 0s; width: 4674px;">
                                @php
                                $related_products= \App\Models\Product::all()->where('cat_id',$single->cat_id)->except($single->id);
                                @endphp
                               @foreach($related_products as $r_product)
                                    <div class="owl-item cloned" style="width: 216px; margin-right: 30px;">
                                        <div class="ps-product">
                                            <div class="ps-product__thumbnail"><a href="{{url('product/'.$r_product->slug)}}"><img src="{{asset('uploads/products/'.$r_product->image)}}" alt="{{$r_product->title}}"></a>
                                                <ul class="ps-product__actions">
                                                    <li><a href="{{url('/cart')}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__container">
                                                <a class="ps-product__vendor" href="{{url('/brand/'.\App\Models\Brand::find($r_product->brand_id)->slug)}}">{{\App\Models\Brand::find($r_product->brand_id)->brand_name}}</a>
                                                <div class="ps-product__content">
                                                    <a class="ps-product__title" href="{{url('product/'.$r_product->slug)}}">{{$r_product->title}}</a>
                                                    <p class="ps-product__price sale">{{$r_product->price}}</p>
                                                </div>
                                                <div class="ps-product__content hover">
                                                    <a class="ps-product__title" href="{{url('product/'.$r_product->slug)}}">{{$r_product->title}}</a>
                                                    <p class="ps-product__price sale">{{$r_product->price}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button" role="presentation" class="owl-prev"><i class="icon-chevron-left"></i></button>
                            <button type="button" role="presentation" class="owl-next"><i class="icon-chevron-right"></i>
                            </button>
                        </div>
                        <div class="owl-dots">
                            <button role="button" class="owl-dot active"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
