@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- Categorias -->
    <div class="container-fluid container-md my-5 p-2 p-sm-5 overflow-hidden">
        <div class="row mt-2 ">
            <div class="col ">
                <h1 class="text-center h2 ">
                    Categorías
                </h1>
            </div>
        </div>
        <div class="row d-sm-none d-flex justify-content-center align-items-center mt-3">
            <button class="btn btn-primary rounded-pill w-50" data-bs-toggle="modal" data-bs-target="#categoriesModal">
                Ver todas las Categorías
            </button>
        </div>
        <div class="row d-sm-flex d-none categories justify-content-center align-items-center mt-2">
            @for ($i = 0; $i < 6; $i++)
                <a href="{{ route('categories.show', $categories[$i]->slug) }}"
                    class="category row text-decoration-none m-2 px-1 py-4 rounded flex-column justify-content-center align-items-center">
                    <i class="{{ $categories[$i]->icon }} text-center"></i>
                    <h5 class="text-center mt-1">{{ $categories[$i]->name }}</h5>
                    <div class="row"></div>
                </a>
            @endfor
            <a href="#"
                class="category row text-decoration-none m-2 px-1 py-4 rounded flex-column justify-content-center align-items-center"
                data-bs-toggle="modal" data-bs-target="#categoriesModal">
                <i class="fas text-center fa-ellipsis-h"></i>
                <h5 class="text-center mt-1">Más</h5>
                <div class="row"></div>
            </a>
        </div>
    </div>
    @if ($products->count() == 0)
        <div class="alert alert-warning text-center mt-4 w-100 w-md-50 mx-auto">No hay productos relacionados con esta
            categoria</div>
    @else
        <!-- CONTENEDOR TARJETAS -->
        <div class="container-fluid background-2 py-5">
            <div class="container-fluid container-md">
                <div class="row justify-content-center align-content-center">
                    <div class="col mb-4">
                        <h1 class="text-center h2">
                            Productos de la categoría <span class="fw-bold">{{ $category->name }}</span>
                        </h1>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center align-items-center">
                        @foreach ($products as $product)
                            <a href="{{ route('shop.product.show', [$product->shop->slug, $product->slug]) }}"
                                class="card card-product border text-white position-relative mb-5 p-0">
                                <img class="card-image" src="{{ asset('storage/' . $product->image) }}"
                                    alt="Card image" />
                                <div class="card-over"></div>
                                <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                                    @if (round($product->opinions()->avg('score'), 2) / 2 <= 0.5)
                                        <i class="fa fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @elseif (round($product->opinions()->avg('score'), 2) / 2 <= 1) <i
                                            class="fas fa-star"></i>
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
                                                        @elseif (round($product->opinions()->avg('score'), 2) / 2 <=
                                                                3.5) <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fa fa-star-half-alt"></i>
                                                                <i class="far fa-star"></i>
                                                            @elseif (round($product->opinions()->avg('score'), 2) / 2 <=
                                                                    4) <i class="fas fa-star"></i>
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
    <!-- MODALS -->
    <div class="modal fade" id="categoriesModal" tabindex="-1" aria-labelledby="categoriesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                added/product_seeder <div class="modal-header">
                    <h5 class="modal-title" id="categoriesModalLabel">
                        Todas las Categorías
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body categories d-flex justify-content-center flex-wrap align-content-center">
                    @foreach ($categories as $category)
                        <a href="{{ route('categories.show', $category->slug) }}"
                            class="category row text-decoration-none m-2 px-1 py-4 rounded flex-column justify-content-center align-items-center">
                            <i class="text-center {{ $category->icon }}"></i>
                            <h5 class="text-center">{{ $category->name }}</h5>
                            <div class="row"></div>
                        </a>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraFooter')
@endsection
