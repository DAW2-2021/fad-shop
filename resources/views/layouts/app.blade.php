<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FAD Shop') }} {{ $title ?? '' }}</title>
    <meta name="description" content="La aplicación compra venta líder en escoles Nuria" />
    <meta name="keywords" content="compra,venta,escolesnuria,nuria,compraventa,barato" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcat icon" href="{{ asset('favicon.png') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BKHN6YTB14"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BKHN6YTB14');

    </script>

    <!-- Css Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- JQUERY -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- JQUERY COOKIES-->
    <script src="{{ asset('js/jquery-cookies.min.js') }}"></script>
    <!-- FUNCTIONS -->
    <script src="{{ asset('js/functions.js') }}"></script>
    @yield('extraHeader')
</head>

<body>
    @include('includes.navbar')

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Al iniciar -->
    <script>
        $(document).ready(function() {
            if (typeof $.cookie('cart-data') === 'undefined') {
                $.cookie('cart-data', '|', {
                    path: '/',
                    expires: 365
                });
            }
            updateSizeCart();
        })

    </script>
    @yield('extraFooter')
</body>

</html>
