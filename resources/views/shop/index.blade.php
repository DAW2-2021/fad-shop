@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    @include('includes.navbar-shop')
    <!-- SLIDER -->
    <div class="container-fluid container-md my-5 p-2 carousel-container">
        <div class="row my-2">
            <div class="col">
                <h1 class="text-center h2">
                    Productos Añadidos Recientemente
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="carousel-wrap mx-auto" style="width:90%">
                    <div class="owl-carousel owl-theme" id="slider">
                        @foreach ($productsCarousel as $product)
                            <div class="item">
                                <a href="{{ route('shop.product.index', [$shop->slug, $product->slug]) }}"
                                    class="card card-product border text-white position-relative mb-5 p-0">
                                    <img class="card-image" src="{{ asset('storage/' . $product->image) }}"
                                        alt="Imagen del producto {{ $product->name }}, de la tienda {{ $shop->name }}" />
                                    <div class="card-over"></div>
                                    <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                                        @if (round($product->opinions()->avg('score'), 2) <= 0.49)
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif (round($product->opinions()->avg('score'), 2) <= 0.99) <i
                                                class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif (round($product->opinions()->avg('score'), 2) <= 1.49) <i
                                                    class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif (round($product->opinions()->avg('score'), 2) <= 1.99) <i
                                                        class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    @elseif (round($product->opinions()->avg('score'), 2) <= 2.49) <i
                                                            class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        @elseif (round($product->opinions()->avg('score'), 2) <= 2.99)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            @elseif (round($product->opinions()->avg('score'), 2) <=
                                                                    3.49) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                @elseif (round($product->opinions()->avg('score'), 2) <=
                                                                        3.99) <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    @elseif (round($product->opinions()->avg('score'),
                                                                        2) <= 4.49) <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                        @elseif(round($product->opinions()->avg('score'),
                                                                            2) <= 4.99) <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star-half-alt"></i>
                                                                            @elseif(round($product->opinions()->avg('score'),
                                                                                2) == 5)
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>

                                        @endif
                                    </div>
                                    <h5
                                        class="position-absolute mh-25 w-75 text-center top-100 start-50 translate-middle card-title bg-dark ms-0 rounded-pill px-3 py-2">
                                        @if (Str::length($product->name) <= 10)
                                            {{ $product->name }}
                                        @else
                                            {{ Str::substr($product->name, 0, 10) . '...' }}
                                        @endif
                                    </h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- CONTROLS -->
                    <div class="customNextBtn">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </div>
                    <div class="customPrevBtn">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN SLIDER -->
    <!-- CONTENEDOR TARJETAS -->
    <div class="container-fluid py-5 background-2" style="margin-top: 100px !important;">
        <div class="container-fluid container-md">
            <div class="row justify-content-center align-content-center">
                <div class="col mb-4">
                    <h1 class="text-center h2">
                        Todos los Productos
                    </h1>
                </div>
                <div id="products" class="d-flex flex-wrap justify-content-center align-items-center">
                    @foreach ($products as $product)
                        <a href="{{ route('shop.product.index', [$shop->slug, $product->slug]) }}"
                            class="card card-product border text-white position-relative mb-5 p-0">
                            <img class="card-image" src="{{ asset('storage/' . $product->image) }}"
                                alt="Imagen del producto {{ $product->name }}, de la tienda {{ $shop->name }}" />
                            <div class="card-over"></div>
                            <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                                @if (round($product->opinions()->avg('score'), 2) / 2 <= 0.50)
                                <i class="fa fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @elseif (round($product->opinions()->avg('score'), 2) / 2 <= 1) 
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                @elseif (round($product->opinions()->avg('score'), 2) / 2 <= 1.5) <i
                                        class="fas fa-star"></i>
                                        <i class="fa fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @elseif (round($product->opinions()->avg('score'), 2) / 2 <= 2) <i
                                            class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif (round($product->opinions()->avg('score'), 2) / 2 <= 2.5) <i
                                                class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fa fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif (round($product->opinions()->avg('score'), 2) / 2 <= 3) <i
                                                    class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif (round($product->opinions()->avg('score'), 2) / 2 <= 3.5) <i
                                                        class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fa fa-star-half-alt"></i>
                                                        <i class="far fa-star"></i>
                                                    @elseif (round($product->opinions()->avg('score'), 2) / 2 <= 4)
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        @elseif (round($product->opinions()->avg('score'),
                                                            2) / 2 <= 4.5) <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fa fa-star-half-alt"></i>
                                                            @elseif(round($product->opinions()->avg('score'),
                                                                2) / 2 <= 5) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                            @endif
                            </div>
                            <h5
                                class="position-absolute mh-25 w-75 text-center top-100 start-50 translate-middle card-title bg-dark ms-0 rounded-pill px-3 py-2">
                                @if (Str::length($product->name) <= 10)
                                    {{ $product->name }}
                                @else
                                    {{ Str::substr($product->name, 0, 10) . '...' }}
                                @endif
                            </h5>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="row d-flex justify-content-center paginator">{{ $products->links() }}</div>
        </div>
    </div>
    <span></span>
@endsection

@section('extraFooter')
    <script>
        $(document).ready(function() {
            // ---- Carousel functions
            var owl = $('.carousel-wrap .owl-carousel').owlCarousel({
                loop: true,
                center: true,
                nav: false,
                autoWidth: true,
            })
            $('.customNextBtn').click(function() {
                owl.trigger('prev.owl.carousel', [300])
            })
            $('.customPrevBtn').click(function() {
                owl.trigger('next.owl.carousel')
            })
            // ---- END Carousel functions
        })

    </script>
@endsection
