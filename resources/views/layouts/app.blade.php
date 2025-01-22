<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex,nofollow">
        <meta name="facebook-domain-verification" content="cbazj0zewbr9wpn0puwzisa8mnh28j" />
        @stack('meta-seo')
        <title>@yield('title')</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/dist/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap-icons/font/bootstrap-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">
        <link rel="shortcut icon" href="{{ url('files/mainconfig/',$global_config_data->favicon) }}" type="image/x-icon">
        <link rel="icon" href="{{ url('files/mainconfig/',$global_config_data->favicon) }}" type="image/x-icon">
        <link rel="canonical" href="{{ url()->current()}}"/>
        @stack('style')

        <!-- Custom styles for this template -->

        @stack('script')
        <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/toastr/toastr.js') }}"></script>
        <script src="{{ asset('assets/js/color-modes.js') }}"></script>
        
        <!-- Custom styles for this template -->
        {!!$global_config_data->meta_pixel!!}
    </head>
    <body>
            @include('layouts.mode')
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="check" viewBox="0 0 16 16">
                <title>Check</title>
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </symbol>
        </svg>
        <div class="container py-3">

            {{-- HEADER --}}
            @include('layouts.header')

            <main>
                @yield('content')
            </main>

            {{-- FOOTER --}}
            @include('layouts.footer')

        </div>

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
