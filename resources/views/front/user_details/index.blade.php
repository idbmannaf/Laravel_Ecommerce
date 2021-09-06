@extends('layouts.front')
@section('title')
    User Information
@endsection
@section('style')

@endsection
@section('content')
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{'/'}}">Home</a></li>
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
                                        <li class="active"><a href="{{route('user.information')}}"><i class="icon-user"></i> Account Information</a></li>
                                        <li><a href="{{route('user.notification')}}"><i class="icon-alarm-ringing"></i> Notifications</a></li>
                                        <li><a href="{{route('user.invoice')}}"><i class="icon-papers"></i> Invoices</a></li>
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
                            <form class="ps-form--account-setting" action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="ps-form__header">
                                    <h3> User Information</h3>
                                </div>
                                <div class="ps-form__content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="full_name" value="{{$user_data->full_name ??''}}" placeholder="Please enter your Full Name...">
                                        </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control" type="text" value="{{$user_data->phone??''}}" name="phone" placeholder="Please enter phone number...">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Date Of Birth</label>
                                                <input class="form-control" type="date" value="{{$user_data->dob??''}}" name="dob" placeholder="Please enter phone number...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    <option value="m">Male</option>
                                                    <option value="f">Female</option>
                                                    <option value="o">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input class="form-control" value="{{$user_data->country??''}}" type="text" name="country">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control" value="{{$user_data->city??""}}" type="text" name="city">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Post</label>
                                                <input class="form-control" value="{{$user_data->post??""}}" type="text" name="post">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control" value="{{$user_data->address??""}}" type="text" name="address">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Profile Image</label>
                                                <input class="form-control" type="file" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button type="submit" class="ps-btn">Update</button>
                                </div>
                            </form>
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
