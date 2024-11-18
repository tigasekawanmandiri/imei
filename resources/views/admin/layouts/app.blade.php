<!doctype html>
<html lang="en">

<head>
<title>@yield('seo_title')</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="{{ asset('admin/favicon.ico') }}" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/charts-c3/plugin.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/toastr/toastr.min.css') }}">
<style>
    .annual_report .c3-axis.c3-axis-y{ display: none;}
    .annual_report .c3-axis.c3-axis-x{ display: none;}
    
</style>
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}">
@stack('style')
</head>

<body data-theme="light" class="font-nunito">

<div id="wrapper" class="theme-cyan">

    <!-- Page Loader -->
    @include('admin.layouts.loader')

    <!-- Top navbar div start -->
    @include('admin.layouts.nav')

    <!-- main left menu -->
    @include('admin.layouts.leftbar')

    <!-- rightbar icon div -->
    @include('admin.layouts.rightbar')

    <!-- mani page content body part -->
    <div id="main-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    
</div>

<!-- Javascript -->
<script src="{{ asset('admin/assets/bundles/libscripts.bundle.js') }}"></script>    
<script src="{{ asset('admin/assets/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset('admin/assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/toastr/toastr.js') }}"></script>

<!-- page js file -->
<script src="{{ asset('admin/assets/bundles/mainscripts.bundle.js') }}"></script>

@stack('script')

@if ($errors->any())
@foreach ($errors->all() as $error)
    <script>
        toastr['info']('{{ $error }}', '', {
            positionClass: 'toast-top-right'
        });
    </script>
@endforeach
@endif

@if (session()->get('error'))
    <script>
        toastr['error']('{{ session()->get('error') }}', '', {
            positionClass: 'toast-top-right'
        });
    </script>
@endif

@if (session()->get('success'))
    <script>
        toastr['success']('{{ session()->get('success') }}', '', {
            positionClass: 'toast-top-right'
        });
    </script>
@endif

</body>
</html>
