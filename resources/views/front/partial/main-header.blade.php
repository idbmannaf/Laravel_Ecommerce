<header class="header header--standard header--market-place-2" data-sticky="true">
    <div class="header__top">
        <div class="container">
            <div class="header__left">
                <p>Welcome to Dynamic Store !</p>
            </div>
            <div class="header__right">
                <ul class="header__top-links">
                    <li><a href="#">Store Location</a></li>
                    <li><a href="#">Track Your Order</a></li>
                    <li>
                        <div class="ps-dropdown"><a href="#">US Dollar</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#">Us Dollar</a></li>
                                <li><a href="#">Euro</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="ps-dropdown language"><a href="#"><img src="{{ asset('front') }}/img/flag/en.png"
                                    alt="">English</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#"><img src="{{ asset('front') }}/img/flag/germany.png" alt="">
                                        Germany</a>
                                </li>
                                <li><a href="#"><img src="{{ asset('front') }}/img/flag/fr.png" alt=""> France</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header__content">
        <div class="container">
            <div class="header__content-left">
                <a class="ps-logo" href="{{url('/')}}"><img src="{{ asset('uploads') }}/logi.png" alt=""></a>
                <div class="menu--product-categories">
                    <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                    <div class="menu__content">
                        <ul class="menu--dropdown">
                            @php
                                $categories= \App\Models\Category::all();
                            @endphp
                            @forelse($categories as $cat)
                                <li class="menu-item-has-children has-mega-menu">
                                    <a href="{{url('category/'.$cat->slug)}}">{{$cat->name}}</a>
                                    <div class="mega-menu">
                                        <div class="mega-menu__column">
                                            <ul class="mega-menu__list">
                                                <?php
                                                $subcategories= \App\Models\SubCategory::where('cat_id',$cat->id)->get();
                                                ?>
                                                @forelse($subcategories as $sub)
                                                        <li><a href="{{url('subcategory/'.$sub->slug)}}">{{$sub->name}}</a></li>
                                                    @empty

                                                    @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @empty
                            @endforelse
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header__content-center">
                <form class="ps-form--quick-search" action="index.html" method="get">
                    <div class="form-group--icon"><i class="icon-chevron-down"></i>
                        <select class="form-control">
                            <option value="1">All</option>
                            <option value="1">Smartphone</option>
                            <option value="1">Sounds</option>
                            <option value="1">Technology toys</option>
                        </select>
                    </div>
                    <input class="form-control" type="text" placeholder="I'm shopping for...">
                    <button>Search</button>
                </form>
            </div>
            <div class="header__content-right">
                <div class="header__actions">
                    <a class="header__extra" href="{{url('user/wishlist')}}">
                        <i class="icon-heart"></i><span><i>{{count(\App\Models\Wishlist::where('user_id',\Illuminate\Support\Facades\Auth::id())->get())}}</i></span></a>
                    <div class="ps-cart--mini">
                        <a class="header__extra" href="{{url('/cart')}}">
                            <i class="icon-bag2"></i>
                            <span><i>{{\App\Models\cart::where('random_id',Cookie::get('generate_cart_id'))->count()}}</i></span>
                        </a>
                        @php
                            $cart_products= \App\Models\cart::with('product')->where('random_id',Cookie::get('generate_cart_id'))->get();
                        @endphp
                        @if($cart_products)
                        <div class="ps-cart__content">
                            <div class="ps-cart__items">
                            @forelse($cart_products as $cart_product)

                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail">
                                        <a href="{{url('product/'.$cart_product->product->slug)}}"><img src="{{asset('uploads/products/'.$cart_product->product->image)}}" alt="Cart"></a>
                                    </div>
                                    <div class="ps-product__content">
                                        <a id="delete_cart_product" data_cart_id="{{$cart_product->id}}" class="ps-product__remove" href="#"><i class="icon-cross"></i></a>
                                        <a href="{{url('product/'.$cart_product->product->slug)}}">{{$cart_product->product->title}}</a>
                                        <p><small>{{$cart_product->quantity}} x {{$cart_product->product->price}}</small>
                                    </div>
                                </div>
                                    <hr>
                                @empty
                                @endforelse
                            </div>
                            <div class="ps-cart__footer">
                                <figure>
                                    <a class="ps-btn" href="{{url('/cart')}}">View Cart</a>
                                    <a class="ps-btn" href="{{url('/checkout')}}">Checkout</a>
                                </figure>
                            </div>

                        </div>
                        @endif

                    </div>
                    @auth
                        <div class="ps-block--user-account"><i class="icon-user"></i>
                            <div class="ps-block__content">
                                <ul class="ps-list--arrow">
                                    <li><a href="{{route('user.information')}}">Account Information</a></li>
                                    <li><a href="{{route('user.notification')}}">Notifications</a></li>
                                    <li><a href="{{route('user.invoice')}}">Invoices</a></li>
                                    <li><a href="{{route('user.address')}}">Address</a></li>
                                    <li><a href="{{url('/wishlist')}}">Wishlist</a></li>
                                    <li class="ps-block__footer">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                       @guest
                        <div class="ps-block--user-header">
                            <div class="ps-block__left"><i class="icon-user"></i></div>
                            <div class="ps-block__right"><a href="{{route('login')}}">Login</a>
                                <a href="{{route('register')}}">Register</a>
                            </div>
                    </div>
                        @endguest
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container">
            <ul class="menu menu--market-2">
                <li>
                    <a href="{{url('category')}}">All Categories</a>
                </li>
                @php
                $main_categories= \App\Models\Category::all()->take(7);
                @endphp
                @foreach($main_categories as $m_category)
                    <li class="{{ $m_category->slug == Request::segment(2) ?"active_nav":'' }}">
                        <a href="{{url('category/'.$m_category->slug)}}">{{$m_category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
