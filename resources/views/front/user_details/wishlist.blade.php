@extends('layouts.front')
@section('title')
    Wishlist
@endsection
@section('style')

@endsection
@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>User Information</li>
            </ul>
        </div>
    </div>
    <section class="ps-section--account">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ps-section__left">
                        <?php
                        $user_data= \App\Models\UserDetails::where('user_id',\Illuminate\Support\Facades\Auth::id())->first();
                        ?>
                        <aside class="ps-widget--account-dashboard">
                            <div class="ps-widget__header">
                                @if(isset($user_data->image))
                                    <img src="{{asset('uploads/users/'.$user_data->image)}}" alt="{{\Illuminate\Support\Facades\Auth::user()->name}}" />
                                @else
                                    <img src="{{asset('uploads/users/dumy.jpg')}}" alt="user not Found" />
                                @endif
                                <figure>
                                    <figcaption>
                                        @if(isset($user_data->full_name))
                                            {{$user_data->full_name}}
                                        @else
                                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                                        @endif
                                    </figcaption>
                                    <p><a href="mailto:{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                            <span>{{\Illuminate\Support\Facades\Auth::user()->email}}</span></a></p>
                                </figure>
                            </div>
                            <div class="ps-widget__content">
                                <ul>
                                    <li><a href="{{route('user.information')}}"><i class="icon-user"></i> Account Information</a></li>
                                    <li><a href="{{route('user.notification')}}"><i class="icon-alarm-ringing"></i> Notifications</a></li>
                                    <li><a href="{{route('user.invoice')}}"><i class="icon-papers"></i> Invoices</a></li>
                                    <li><a href="{{route('user.address')}}"><i class="icon-map-marker"></i> Address</a></li>
                                    <li class="active"><a href="{{route('user.wishlist')}}"><i class="icon-heart"></i> Wishlist</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                <i class="icon-power-switch"></i> {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ps-section__right">
                        <div class="ps-section--account-setting">
                            <div class="ps-section__header">
                                <h3>Invoices</h3>
                            </div>
                            <div class="ps-section__content">
                                <div class="table-responsive">
                                    <table class="table ps-table--whishlist ps-table--responsive">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product name</th>
                                            <th>Unit Price</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($wishlists)
                                            @forelse($wishlists as $wishlist)
                                                <tr>
                                                    <td data-label="Remove"><a href="{{route('destroy.wishlist',['id'=>$wishlist->id])}}"><i class="icon-cross"></i></a></td>
                                                    <td data-label="Product">
                                                        <div class="ps-product--cart">
                                                            <div class="ps-product__thumbnail"><a href="{{url('product/'.$wishlist->product->slug)}}"><img src="{{asset('uploads/products/'.$wishlist->product->image)}}" alt="{{$wishlist->product->title}}"></a></div>
                                                            <div class="ps-product__content"><a href="{{url('product/'.$wishlist->product->slug)}}">{{$wishlist->product->title}}</a>
                                                                <p>Sold By:<strong> YOUNG SHOP</strong></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="price" data-label="Price">${{$wishlist->product->price}}</td>
                                                    @if($wishlist->product->qty <=0)
                                                        <td data-label="Status"><span style="color: red !important;" class="ps-tag ps-tag--in-stock">Stock Out</span></td>
                                                    @else
                                                        <td data-label="Status"><span class="ps-tag ps-tag--in-stock">In-stock</span></td>
                                                        @endif
                                                    <td width="20%" data-label="d"><a id="btn_table" class="btn btn-lg btn-danger" href="{{route('add.cart',['slug'=>$wishlist->product->slug])}}">Add to cart</a></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-danger text-center">Wishlist Not Found</td>
                                                </tr>
                                            @endforelse
                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="ps-newsletter">
        <div class="ps-container">
            <form class="ps-form--newsletter" action="do_action" method="post">
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__left">
                            <h3>Newsletter</h3>
                            <p>Subcribe to get information about products and coupons</p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__right">
                            <div class="form-group--nest">
                                <input class="form-control" type="email" placeholder="Email address">
                                <button class="ps-btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')

@endsection
