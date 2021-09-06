
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/plugins/apexcharts/apexcharts.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/plugins/DataTables/datatables.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/plugins/lightbox/lightbox.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('assets/admin') }}/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/toastr-master/build/toastr.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    @yield('style')
    <![endif]-->
</head>
<body>

{{--<div class='loader'>--}}
{{--    <div class='spinner-grow text-primary' role='status'>--}}
{{--        <span class='sr-only'>Loading...</span>--}}
{{--    </div>--}}
{{--</div>--}}
