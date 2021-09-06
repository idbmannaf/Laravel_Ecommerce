@include('admin.partial.header')
<div class="page-container">
    @include('admin.partial.navbar')
    @include('admin.partial.sidebar')
    <div class="page-content">
        <div class="main-wrapper">
            @yield('content')
        </div>
    </div>
</div>

@include('admin.partial.footer')
