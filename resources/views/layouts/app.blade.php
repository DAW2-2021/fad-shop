<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FAD Shop') }} {{ $title ?? '' }}</title>
    <meta name="description" content="FAD Shop, la tienda para los MDLR" />
    <meta name="keywords" content="MDLR,calle, flowtt" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcat icon" href="/storage/logos/logo_small_icon_only_inverted.png"> 

    <!-- Google Font -->
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    /> --}}

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
