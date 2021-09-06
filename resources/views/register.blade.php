@extends('layouts.front')
@section('title')
    Login - Register
@endsection
@section('style')

@endsection
@section('content')
    <div class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Registration</li>
                </ul>
            </div>
        </div>
        <div class="ps-my-account">
            <div class="container">
                <form class="ps-form--account ps-tab-root" action="{{ route('register') }}" method="post">
                    @csrf
                    <ul class="ps-tab-list">
                        <li class="active"><a href="">Registration</a></li>
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="sign-in">
                            <div class="ps-form__content">
                                <h5>Register In Your Account</h5>
                                <div class="form-group">
                                    <input placeholder="Enter Your Name" id="name" class="form-control" type="text" name="name" value="{{old('name')}}" required autofocus>
                                   @error('name')
                                    <div><span class="text-danger">{{$message}}</span></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input placeholder="Enter Your E-mail" id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required>
                                    @error('email')
                                    <div><span class="text-danger">{{$message}}</span></div>
                                    @enderror
                                </div>
                                <div class="form-group form-forgot">
                                    <input id="password" class="form-control" type="password" name="password" placeholder="Enter Password" required autocomplete="new-password" >
                                    @error('password')
                                    <div><span class="text-danger">{{$message}}</span></div>
                                    @enderror
                                </div>
                                <div class="form-group form-forgot">
                                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Enter Re Password" required autocomplete="new-password" >
                                    @error('password_confirmation')
                                    <div><span class="text-danger">{{$message}}</span></div>
                                    @enderror
                                </div>
                                <div class="form-group submtit">
                                    <button class="ps-btn ps-btn--fullwidth">Login</button>
                                </div>
                                <div class="mt-2 mb-2">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
