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
                                   <li class="active" style="padding: 10px 5px; text-align: center; font-size: 30px">Billing Information</li>
                               </ul>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$billing_details->first_name." ". $billing_details->last_name}}</td>

                                    </tr>
                                    @if($billing_details->company_name)
                                    <tr>
                                        <th>Company</th>
                                        <td>{{$billing_details->company_name}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$billing_details->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{$billing_details->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Country</th>
                                        <td>{{$billing_details->country}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$billing_details->address}}</td>
                                    </tr>

                                    @if($billing_details->note)
                                        <tr>
                                            <th>Note</th>
                                            <td>{{$billing_details->note}}</td>
                                        </tr>
                                    @endif
                                </table>
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
                                @if(\App\Models\Order::where('id',$billing_details->order_id)->first()->invoice)
                                    <div class="d-flex justify-content-end"><p><a href="javascript:void (0)" id="download" orderid="{{$billing_details->order_id}}" class="btn btn-lg btn-success">Download Invoice</a></p></div>
                                    @endif
                                <div class="table-responsive">
                                    <table class="table ps-table ps-table--invoices">
                                        <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Unit Price</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Brand</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($ordered_product)
                                            @forelse($ordered_product as $o_p)
                                                <tr>
                                                    <td>{{$o_p->id}}</td>
                                                    <td><img width="100px" src="{{asset('uploads/products/'.$o_p->product->image)}}" alt=""></td>
                                                    <td><a target="_blank" href="{{url('product/'.$o_p->product->slug)}}">{{$o_p->product->title}}</a></td>
                                                    <td>{{$o_p->product->price}}</td>
                                                    <td><a target="_blank" href="{{url('category/'.$o_p->product->category->slug)}}">{{$o_p->product->category->name}}</a></td>
                                                    <td><a href="{{url('subcategory/'.$o_p->product->subcategory->slug)}}">{{$o_p->product->subcategory->name}}</a></td>
                                                    <td>{{$o_p->product->brand->brand_name}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-danger text-center">No Order Found</td>
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
    <script>
        $(document).ready(function (){
            $("a#download").click(function (){
               var order_id= $(this).attr('orderid');
               $.ajaxSetup({
                   headers:{
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   url:"{{route('order.download')}}",
                   method:'post',
                   data:{id:order_id},
                   success:function (response){

                   }
               });
            });
        });
    </script>
@endsection
