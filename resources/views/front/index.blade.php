@extends('layouts.front')
@section('title')
Dynamic Store
@endsection
@section('style')

@endsection
@section('content')
    <div class="ps-home-banner">
        <div class="container">
            <div class="ps-section__left">
                <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true"
                     data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                     data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1"
                     data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                    <a href="#"><img src="{{ asset('front') }}/img/slider/home-4/1.jpg" alt=""></a>
                    <a href="#"><img src="{{ asset('front') }}/img/slider/home-4/2.jpg" alt=""></a>
                    <a href="#"><img src="{{ asset('front') }}/img/slider/home-4/3.jpg" alt=""></a>
                </div>
            </div>
            <div class="ps-section__right">
                <a class="ps-collection" href="#"><img src="{{ asset('front') }}/img/slider/home-4/left.jpg"
                                                       alt=""></a>
            </div>
        </div>
    </div>
    <div class="ps-deal-of-day">
        <div class="container">
            <div class="ps-section__header">
                <div class="ps-block--countdown-deal">
                    <div class="ps-block__left">
                        <h3>Deal of the day</h3>
                    </div>
                    <div class="ps-block__right">
                        <figure>
                            <figcaption>End in:</figcaption>
                            <ul class="ps-countdown" data-time="December 30, 2021 15:37:25">
                                <li><span class="days"></span></li>
                                <li><span class="hours"></span></li>
                                <li><span class="minutes"></span></li>
                                <li><span class="seconds"></span></li>
                            </ul>
                        </figure>
                    </div>
                </div><a href="shop-default.html">View all</a>
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true"
                     data-owl-speed="5000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
                     data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4"
                     data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                   @foreach($deal_of_the_day as $deal)
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail">
                                <a href="{{url('product/'.$deal->slug)}}"><img style="width: 400px; height: 200px" src="{{ asset('uploads/products/'.$deal->image) }}" alt=""></a>
{{--                                <div class="ps-product__badge">-16%</div>--}}
                                <ul class="ps-product__actions">
                                    <li>
                                        <a href="{{route('add.cart',['slug'=>$deal->slug])}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{url('product/'.$deal->slug)}}" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-eye"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{route('add.wishlist',['slug'=>$deal->slug])}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i>
                                        </a></li>
                                    <li>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <p class="ps-product__price sale">${{$deal->price}} <del>${{$deal->price - 50}} </del></p>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="{{url('product/'.$deal->slug)}}">Korea Long Sofa Fabric In Blue Navy Color</a>
                                    <p>Brand:<a href="{{url('brand/'.$deal->brand->slug)}}">{{$deal->brand->brand_name}}p</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="ps-home-categories">
        <div class="container">
            <div class="ps-section__header">
                <h3>Top Categories Of The Month</h3>
            </div>
            <div class="ps-section__content">
                <div class="row align-content-lg-stretch">
                    @if($categories)
                        @forelse($categories as $cat)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--category-2" data-mh="categories">
                            <div class="ps-block__content">
                                <h4>{{$cat->name}}</h4>
                                @if($cat->subcategory)
                                <ul>
                                    @forelse($cat->subcategory as $sub_cat)
                                    <li><a href="{{url('subcategory/'.$sub_cat->slug)}}">{{$sub_cat->name}}</a></li>
                                        @empty
                                        <li class="text-danger">No Subcategory Found in this Category</li>
                                    @endforelse
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                        @empty
                            <h3 class="text-center text-danger">No Category Found</h3>
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($cat_product)
        @foreach($cat_product as $cat_product)
    <div class="ps-product-list">
        <div class="container">
            <div class="ps-section__header">
                <h3>{{$cat_product->name}}</h3>
                <ul class="ps-section__links">
                    <li><a href="{{url('category/'.$cat_product->slug)}}">View All</a></li>
                </ul>
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
                     data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"
                     data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                     data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                    @if($cat_product->product)
                        @forelse($cat_product->product as $catwaise_product)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a href="{{url('product/'.$catwaise_product->slug)}}"><img style="width: 400px; height: 200px" src="{{asset('uploads/products/'.$catwaise_product->image)}}" alt="{{$catwaise_product->title}}"></a>
                                    <div class="ps-product__badge">-16%</div>
                                    <ul class="ps-product__actions">
                                        <li>
                                            <a href="{{route('add.cart',['slug'=>$catwaise_product->slug])}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{url('product/'.$catwaise_product->slug)}}" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{route('add.wishlist',['slug'=>$catwaise_product->slug])}}" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">{{$catwaise_product->brand->brand_name}}</a>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="{{url('product/'.$catwaise_product->slug)}}">{{$catwaise_product->title}}</a>
                                        <p class="ps-product__price sale">{{$catwaise_product->price}} <del>{{$catwaise_product->price +100}} </del></p>
                                    </div>
                                    <div class="ps-product__content hover">
                                        <a class="ps-product__title" href="{{url('product/'.$catwaise_product->slug)}}">{{$catwaise_product->title}}</a>
                                        <p class="ps-product__price sale">{{$catwaise_product->price}} <del>{{$catwaise_product->price +100}} </del></p>
                                    </div>
                                </div>
                            </div>

                        @empty

                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
        @endforeach
    @endif

@endsection
@section('script')

@endsection
