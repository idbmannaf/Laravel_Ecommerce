@extends('layouts.front')
@section('title')
Checkout
@endsection
@section('style')

@endsection
@section('content')

    <div class="ps-checkout ps-section--shopping">
        <div class="container">
            <div class="ps-section__header">
                <h1>Check Out</h1>
            </div>
            <div class="ps-section__content">
                    {!! Form::open(['url' => '/order','method'=>'POST']) !!}
                    <div class="row">
                        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 ">
                            <div class="ps-form__billing-info">
                                <h3 class="ps-form__heading">Billing Details</h3>
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="first_name">First Name<sup>*</sup>
                                           </label>
                                           <div class="form-group__content">
                                               {!! Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) !!}
                                           </div>
                                           @error('first_name')<span class="text-danger">{{$message}}</span>@enderror
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="last_name">Last Name<sup>*</sup>
                                           </label>
                                           <div class="form-group__content">
                                               {!! Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) !!}
                                           </div>
                                           @error('last_name')<span class="text-danger">{{$message}}</span>@enderror
                                       </div>
                                   </div>
                               </div>
                                <div class="form-group">
                                    <label for="company_name">Company Name<sup>*</sup>
                                    </label>
                                    <div class="form-group__content">
                                        {!! Form::text('company_name',null,['class'=>'form-control','id'=>'company_name']) !!}
                                    </div>
                                    @error('company_name')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email Address<sup>*</sup></label>
                                            <div class="form-group__content">
                                                {!! Form::text('email',null,['class'=>'form-control','id'=>'email']) !!}
                                            </div>
                                            @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country<sup>*</sup></label>
                                            <div class="form-group__content">
                                                {!! Form::text('country',null,['class'=>'form-control','id'=>'country']) !!}
                                            </div>
                                            @error('country')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone<sup>*</sup></label>
                                    <div class="form-group__content">
                                        {!! Form::text('phone',null,['class'=>'form-control','id'=>'phone']) !!}
                                    </div>
                                    @error('phone')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address<sup>*</sup></label>
                                    <div class="form-group__content">
                                        {!! Form::text('address',null,['class'=>'form-control','id'=>'address']) !!}
                                    </div>
                                    @error('address')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <h3 class="mt-40"> Addition information</h3>
                                <div class="form-group">
                                    <label>Order Notes</label>
                                    <div class="form-group__content">
                                        {!! Form::textarea('note',null,['class'=>'form-control','id'=>'note']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12 ">
                            <div class="ps-form__total">
                                <h3 class="ps-form__heading">Your Order</h3>
                                <div class="content">
                                    <div class="ps-block--checkout-total">
                                        <div class="ps-block__content">
                                            <table class="table ps-block__products">
                                                <tbody>
                                                @foreach(\App\Models\cart::with('product')->where('random_id',Cookie::get('generate_cart_id'))->get() as $cart_item)
                                                <tr>
                                                    <td><a href="{{url('product/'.$cart_item->product->slug)}}"> {{$cart_item->product->title}} x {{$cart_item->quantity}}</a>
                                                    </td>
                                                    <td>{{$cart_item->product->price * $cart_item->quantity}}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <h6 class="ps-block__title">Total:  <span>{{session('total')}}</span></h6>
                                            <h5 class="ps-block__title">Discount:  <span>{{session('discount')}}</span></h5>
                                            <h3>Total: <span>${{session('subtotal')}}</span></h3>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="radio" name="payment_type" value="online" id="o" > &nbsp;
                                        <label for="o">Online Payment</label> <br>
                                        <input type="radio" name="payment_type" value="cod" id="cod" > &nbsp;
                                        <label for="cod">Cash On Delivery</label>
                                        @error('payment_type')<div class="text-danger">{{$message}}</div>@enderror
                                    </div>
                                    <input type="submit" class="ps-btn ps-btn--fullwidth" value="Proceed to Order">
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
