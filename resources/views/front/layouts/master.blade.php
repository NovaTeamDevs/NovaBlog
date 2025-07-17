<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'نوا بلاگ')</title>

    <link rel="icon" href="{{ asset('assets/nova-blog-logo.png') }}" type="image/x-icon" sizes="32x32">

    <link href="{{ asset('assets/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/Vazirmatn-font-face.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">
    @include('front.partials.navigation')

    <!-- Main start -->
    <main class="flex-fill">
        @yield('content')
    </main>
    <!-- Main end -->

    @include('front.partials.footer')

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
