@extends('layouts.front')
@section('title')
Cart
@endsection
@section('style')

@endsection
@section('content')
    <div class="ps-page--simple">
        <div class="ps-section--shopping ps-shopping-cart">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Shopping Cart</h1>
                </div>
                <form action="{{url('cart/update')}}" method="post">
                    @csrf
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--shopping-cart ps-table--responsive">
                            <thead>
                            <tr>
                                <th>Product name</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $total= 0;
                            @endphp
                            @foreach($cart_products as $cart_product)
                            <tr>
                                <td data-label="Product">
                                    <div class="ps-product--cart">

                                        <div class="ps-product__thumbnail"><a href="{{url('product/'.$cart_product->product->slug)}}"><img src="{{asset('uploads/products/'.$cart_product->product->image)}}" alt="" /></a></div>
                                        <div class="ps-product__content"><a href="{{url('product/'.$cart_product->product->slug)}}">{{$cart_product->product->title}}</a>
                                            <p>Brand:<strong> {{$cart_product->product->brand->brand_name}}</strong></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="price" data-label="Price">{{$cart_product->product->price}}</td>
                                <td data-label="Quantity">
                                    <div class="form-group--number">
                                        <button type="button" class="up">+</button>
                                        <button type="button" class="down">-</button>
                                        <input name="quantity[{{$cart_product->id}}]" id="qty" class="form-control" type="text"  value="{{$cart_product->quantity}}">
                                    </div>
                                </td>
                                <?php $total += $cart_product->quantity * $cart_product->product->price; ?>
                                <td data-label="Total">${{$cart_product->quantity * $cart_product->product->price}}</td>
                                <td data-label="Actions"><a id="delete_cart_product" data_cart_id="{{$cart_product->id}}" href="javascript:void (0)"><i class="icon-cross"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="ps-section__cart-actions">
                        <a class="ps-btn" href="{{url('/category')}}"><i class="icon-arrow-left"></i> Back to Shop</a>
                        <button type="submit" class="ps-btn ps-btn--outline"><i class="icon-sync"></i> Update cart</button>
                    </div>

                </div>
                </form>
                <div class="ps-section__footer">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <figure>
                                <figcaption>Coupon Discount</figcaption>
                                <div class="form-group">
                                    <input class="form-control" name="coupon_code" type="text" id="coupon_code"  @if($coupon_code !=' ')value="{{$coupon_code}}" @endif>

                                    @if($coupon_msg == "valid")
                                        <span class="text-success">Valid Coupon</span>
                                    @else
                                        <span class="text-danger">{{$coupon_msg}}</span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <button id="apply" class="ps-btn ps-btn--outline">Apply</button>
                                </div>
                            </figure>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
{{--                            <figure>--}}
{{--                                <figcaption>Calculate shipping</figcaption>--}}
{{--                                <div class="form-group">--}}
{{--                                    <select class="ps-select">--}}
{{--                                        <option value="1">America</option>--}}
{{--                                        <option value="2">Italia</option>--}}
{{--                                        <option value="3">Vietnam</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input class="form-control" type="text" placeholder="Town/City">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <input class="form-control" type="text" placeholder="Postcode/Zip">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <button class="ps-btn ps-btn--outline">Update</button>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--shopping-total">
                                <div class="ps-block__header">
                                    <p>total <span> {{$total}}</span></p>
                                    <?php session(['total'=>$total]) ?>
                                </div>
                                <div class="ps-block__header">
                                    <p>Discount ({{$discount??0}} %) <span> {{ $discount= ($discount / 100)*$total }}</span></p>
                                    <?php session(['discount'=>$discount]) ?>
                                    @if($discount)
                                        {{session(['coupon_code'=>$coupon_code])}}
                                        @endif
                                </div>
                                <div class="ps-block__content">
                                    <h3>Sub Total <span>{{$subtotal = $total-$discount}}</span></h3>
                                    <?php session(['subtotal'=>$subtotal]) ?>
                                    {{session('total')}}
                                    {{session('discount')}}
                                    {{session('subtotal')}}
                                    {{session('coupon_code')}}
                                </div>
                            </div><a class="ps-btn ps-btn--fullwidth" href="{{'/checkout'}}">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function (){
            $('#apply').click(function(){
                var coupon_code= $('#coupon_code').val();
                var current_url = '{{ url('cart') }}/'+coupon_code;
                // alert(current_url);
                window.location=current_url;
            });
        });
    </script>
@endsection
