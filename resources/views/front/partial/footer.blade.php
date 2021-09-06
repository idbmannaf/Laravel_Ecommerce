<footer class="ps-footer ps-footer--3">
    <div class="container">
        @if(Request::segment(1) != 'login')
        <div class="ps-block--site-features ps-block--site-features-2">
            <div class="ps-block__item">
                <div class="ps-block__left"><i class="icon-rocket"></i></div>
                <div class="ps-block__right">
                    <h4>Free Delivery</h4>
                    <p>For all oders over $99</p>
                </div>
            </div>
            <div class="ps-block__item">
                <div class="ps-block__left"><i class="icon-sync"></i></div>
                <div class="ps-block__right">
                    <h4>90 Days Return</h4>
                    <p>If goods have problems</p>
                </div>
            </div>
            <div class="ps-block__item">
                <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                <div class="ps-block__right">
                    <h4>Secure Payment</h4>
                    <p>100% secure payment</p>
                </div>
            </div>
            <div class="ps-block__item">
                <div class="ps-block__left"><i class="icon-bubbles"></i></div>
                <div class="ps-block__right">
                    <h4>24/7 Support</h4>
                    <p>Dedicated support</p>
                </div>
            </div>
        </div>
        @endif
        <div class="ps-footer__widgets">
            <aside class="widget widget_footer widget_contact-us">
                <h4 class="widget-title">Contact us</h4>
                <div class="widget_content">
                    <p>Call us 24/7</p>
                    <h3>+880 1744508287</h3>
                    <p>488/1, West Shewrapar, Mirput, Dhaka <br><a
                            href="mailto:idbmannaf@gmail.com"><span> idbmannaf@gmail.com</span></a>
                    </p>
                    <ul class="ps-list--social">
                        <li><a class="facebook" href="https://github.com/idbmannaf"><i class="fab fa-github"></i></a></li>
                        <li><a class="facebook" href="http://facebook.com/abde.mannaf"><i class="fab fa-facebook"></i></a></li>
                        <li><a class="linkedin" href="https://bd.linkedin.com/in/idbmannaf"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Quick links</h4>
                <ul class="ps-list--link">
                    <li><a href="#">Policy</a></li>
                    <li><a href="#">Term & Condition</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Return</a></li>
                    <li><a href="faqs.html">FAQs</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Company</h4>
                <ul class="ps-list--link">
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="#">Affilate</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="contact-us.html">Contact</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Bussiness</h4>
                <ul class="ps-list--link">
                    <li><a href="#">Our Press</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="my-account.html">My account</a></li>
                    <li><a href="shop-default.html">Shop</a></li>
                </ul>
            </aside>
        </div>
        <div class="ps-footer__copyright">
            <p>© 2021 <a href="https://github.com/idbmannaf">Mannaf</a>. All Rights Reserved</p>
            <p>
                <span>We Using Safe Payment For:</span>
                <a href="#"><img src="{{asset('uploads/payment-method/1.jpg')}}" alt=""></a>
                <a href="#"><img src="{{asset('uploads/payment-method/2.jpg')}}" alt=""></a>
                <a href="#"><img src="{{asset('uploads/payment-method/3.jpg')}}" alt=""></a>
                <a href="#"><img src="{{asset('uploads/payment-method/4.jpg')}}" alt=""></a>
                <a href="#"><img src="{{asset('uploads/payment-method/5.jpg')}}" alt=""></a>
            </p>
        </div>
    </div>
</footer>
<div id="back2top"><i class="icon icon-arrow-up"></i></div>
<div class="ps-site-overlay"></div>
<div id="loader-wrapper">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
        <form class="ps-form--primary-search" action="do_action" method="post">
            <input class="form-control" type="text" placeholder="Search for...">
            <button><i class="aroma-magnifying-glass"></i></button>
        </form>
    </div>
</div>
{{-- <script src="{{asset('front') }}/js/jquery-3.6.0.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
{{--<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>--}}
{{-- <script src="{{asset('front')}}/plugins/jquery.min.js"></script> --}}
<script src="{{ asset('front') }}/plugins/nouislider/nouislider.min.js"></script>
<script src="{{ asset('front') }}/plugins/popper.min.js"></script>
<script src="{{ asset('front') }}/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="{{ asset('front') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('front') }}/plugins/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('front') }}/plugins/masonry.pkgd.min.js"></script>
<script src="{{ asset('front') }}/plugins/isotope.pkgd.min.js"></script>
<script src="{{ asset('front') }}/plugins/jquery.matchHeight-min.js"></script>
<script src="{{ asset('front') }}/plugins/slick/slick/slick.min.js"></script>
<script src="{{ asset('front') }}/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="{{ asset('front') }}/plugins/slick-animation.min.js"></script>
<script src="{{ asset('front') }}/plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
<script src="{{ asset('front') }}/plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
<script src="{{ asset('front') }}/plugins/select2/dist/js/select2.full.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/toastr-master/build/toastr.min.js"></script>
<script src="{{ asset('front') }}/plugins/gmap3.min.js"></script>
<!-- custom scripts-->

<script src="{{ asset('front') }}/js/main.js"></script>
@yield('script')
<script>
    <?php if (session('fail')): ?>
        toastr["error"]("<?php echo session('fail') ?>!");
    <?php endif; ?>
        <?php if (session('success')): ?>
        toastr["success"]("<?php echo session('success')?>!");
    <?php endif; ?>
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $('a#delete_cart_product').click(function (){
        var cart_id= $(this).attr('data_cart_id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('delete.cart')}}",
            method: 'post',
            data: {id:cart_id},
            success:function(response){
               if (response == "yes"){
                   toastr["success"]("Product Removed from Cart")
               }else {
                   toastr["error"]("Something Wong")
               }
               setInterval(function (){
                   location.reload();
               },1000);;
            }
        });

    });
</script>
</body>

</html>
