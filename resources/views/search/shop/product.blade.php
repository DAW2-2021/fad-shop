@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    @include('includes.navbar-shop')
    @if ($prods->count() == 0)
        <div class="alert alert-warning text-center mt-4 w-100 w-md-50 mx-auto">No hay productos similares a lo que buscaste
        </div>
    @else
        <!-- CONTENEDOR TARJETAS -->
        <div class="container-fluid py-5">
            <div class="container-fluid container-md">
                <div class="row justify-content-center align-content-center">
                    <div class="col mb-4">
                        <h1 class="text-center h2">
                            Todos los productos parecidos a '{{ $name }}' de la tienda '{{ $shop->name }}'
                        </h1>
                    </div>
                    <div id="products" class="d-flex flex-wrap justify-content-center align-items-center">
                        @foreach ($prods as $prod)
                            <a href="{{ route('shop.product.show', [$prod->shop->slug, $prod->slug]) }}"
                                class="card card-product border text-white position-relative mb-5 p-0">
                                <img class="card-image" src="{{ asset('storage/' . $prod->image) }}"
                                    alt="Imagen del producto {{ $prod->name }}, de la tienda {{ $prod->shop->name }}" />
                                <div class="card-over"></div>
                                <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                                    @if (round($prod->opinions()->avg('score'), 2) / 2 == 0)
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @elseif (round($prod->opinions()->avg('score'), 2) / 2 <= 0.5) <i
                                            class="fa fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif (round($prod->opinions()->avg('score'), 2) / 2 <= 1) <i
                                                class="fas fa-star">
                                                </i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif (round($prod->opinions()->avg('score'), 2) / 2 <= 1.5) <i
                                                    class="fas fa-star"></i>
                                                    <i class="fa fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif (round($prod->opinions()->avg('score'), 2) / 2 <= 2) <i
                                                        class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    @elseif (round($prod->opinions()->avg('score'), 2) / 2 <= 2.5) <i
                                                            class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        @elseif (round($prod->opinions()->avg('score'), 2) / 2 <= 3) <i
                                                                class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            @elseif (round($prod->opinions()->avg('score'), 2) /
                                                                2 <= 3.5) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fa fa-star-half-alt"></i>
                                                                    <i class="far fa-star"></i>
                                                                @elseif (round($prod->opinions()->avg('score'),
                                                                    2) / 2 <= 4) <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                    @elseif(round($prod->opinions()->avg('score'),
                                                                        2) / 2 <= 4.5) <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fa fa-star-half-alt"></i>
                                                                        @elseif(round($prod->opinions()->avg('score'),
                                                                            2) / 2 <= 5) <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                    @endif
                                </div>
                                <h5
                                    class="position-absolute mh-25 w-75 text-center top-100 start-50 translate-middle card-title bg-dark ms-0 rounded-pill px-3 py-2">
                                    @if (Str::length($prod->name) <= 10)
                                        {{ $prod->name }}
                                    @else
                                        {{ Str::substr($prod->name, 0, 10) . '...' }}
                                    @endif
                                </h5>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="row d-flex justify-content-center paginator">{{ $prods->links() }}</div>
            </div>
        </div>
    @endif

@endsection
@section('extraFooter')

@endsection
