@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
@if ($products->count() == 0)
    <div class="alert alert-warning text-center mt-4 w-100 w-md-50 mx-auto">No hay productos relacionados con esta categoria</div>
@else
    <!-- CONTENEDOR TARJETAS -->
    <div class="container-fluid background-1 py-5">
        <div class="container-fluid container-md">
            <div class="row justify-content-center align-content-center">
                <div class="col mb-4">
                    <h1 class="text-center h2">
                        Productos de la categoría <span class="fw-bold">{{ $category->name }}</span>
                    </h1>
                </div>
                <div class="d-flex flex-wrap justify-content-center align-items-center">
                @foreach ($products as $product)
                    <a href="{{ route('shop.product.index', [$product->shop->slug, $product->slug]) }}" class="card card-product border text-white position-relative mb-5 p-0">
                        <img class="card-image" src="{{ asset('storage/'.$product->image) }}" alt="Card image" />
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
                            {{ $product->name }}
                            <!-- TRANSFORMAR CON PHP A LOWER Y HACER UN STRINGPOS Y PONER "..." -->
                        </h5>
                    </a>
                @endforeach
            </div>
            </div>
            <div class="row d-flex justify-content-center paginator">{{ $products->links() }}</div>
        </div>
    </div>
@endif
@endsection

@section('extraFooter')
@endsection
