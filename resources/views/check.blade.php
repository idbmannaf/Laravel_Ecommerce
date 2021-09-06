
<div class="page-container">
@include('admin.partial.navbar')
@include('admin.partial.sidebar')

    <div class="page-content">
        <div class="main-wrapper">
            @yield('content')
        </div>
    </div>
</div>
<!-- Javascripts -->
<script src="{{ asset('assets/admin') }}/plugins/jquery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="{{ asset('assets/admin') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{ asset('assets/admin') }}/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('assets/admin') }}/js/main.min.js"></script>
<script src="{{ asset('assets/admin') }}/js/pages/dashboard.js"></script>
<script>

</script>
@yield('script')
</body>
</html>
