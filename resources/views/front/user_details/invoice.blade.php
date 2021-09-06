@extends('layouts.front')
@section('title')
    Invoice
@endsection
@section('style')

@endsection
@section('content')
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>User Invoice</li>
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
                                    <li class="active"><a href="{{route('user.invoice')}}"><i class="icon-papers"></i> Invoices</a></li>
                                    <li><a href="{{route('user.address')}}"><i class="icon-map-marker"></i> Address</a></li>
                                    <li><a href="{{route('user.wishlist')}}"><i class="icon-heart"></i> Wishlist</a></li>
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
                                    <table class="table ps-table ps-table--invoices">
                                        <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Total</th>
                                            <th>Discount</th>
                                            <th>Subtotal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($order_details)
                                            @forelse($order_details as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->total}}</td>
                                            <td>{{$order->discount}}</td>
                                            <td>{{$order->subtotal}}</td>
                                            <td>@if($order->status == "processing")
                                                    <span class="text-success">{{$order->status}}</span>
                                                @elseif($order->status == "processing")
                                                    <span class="text-primary">{{$order->status}}</span>
                                                @elseif($order->status == "delivered")
                                                    <span class="text-warning">{{$order->status}}</span>
                                                @elseif($order->status == "return")
                                                    <span class="text-danger">{{$order->status}}</span>
                                                @else
                                                    <span class="text-danger">{{$order->status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                            @if($order->status == "pending")
                                                    <a href="{{route('destroy.order',['id'=>$order->id])}}" class="btn btn-danger">Delete</a>
                                                @elseif($order->status == "return")
                                                    <a href="{{route('reorder',['id'=>$order->id])}}" class="btn btn-success">Re-Order</a>
                                                    <a href="{{route('destroy.order',['id'=>$order->id])}}" class="btn btn-danger">Delete</a>
                                                @endif
                                                <a href="{{route('view.order',['id'=>$order->id])}}" class="btn btn-secondary">view</a>
                                            </td>
                                        </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-danger text-center">No Order found</td>
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
