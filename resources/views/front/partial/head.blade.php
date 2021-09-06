<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext"
          rel="stylesheet">
{{--    <link rel="stylesheet" href="{{ asset('front') }}/plugins/font-awesome/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="{{ asset('front') }}/fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="{{ asset('front') }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/plugins/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('front') }}/plugins/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/plugins/lightGallery-master/dist/css/lightgallery.min.css">
{{--    <link rel="stylesheet" href="{{ asset('front') }}/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">--}}
    <link rel="stylesheet" href="{{ asset('front') }}/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/market-place-2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/toastr-master/build/toastr.min.css">
    @yield('style')
</head>

<body>
