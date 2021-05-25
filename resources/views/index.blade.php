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
    <!-- PRODUCTOS DESTACADOS -->
    <div class="container-fluid py-5 background-2">
        <div class="container-fluid container-md">
            <div class="row justify-content-center align-content-center">
                <div class="col mb-4">
                    <h1 class="text-center h2">
                        Productos Destacados
                    </h1>
                </div>
                <div class="d-flex flex-wrap justify-content-center align-items-center">
                    <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                        <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                        <div class="card-over"></div>
                        <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <h5
                            class="position-absolute mh-25 w-75 text-center top-100 start-50 translate-middle card-title bg-dark ms-0 rounded-pill px-3 py-2">
                            text-capitalize asda
                            <!-- TRANSFORMAR CON PHP A LOWER Y HACER UN STRINGPOS Y PONER "..." -->
                        </h5>
                    </a>
                    <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                        <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                        <div class="card-over"></div>
                        <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <h5
                            class="position-absolute mh-25 w-75 text-center top-100 start-50 translate-middle card-title bg-dark ms-0 rounded-pill px-3 py-2">
                            text-capitalize asda
                            <!-- TRANSFORMAR CON PHP A LOWER Y HACER UN STRINGPOS Y PONER "..." -->
                        </h5>
                    </a>
                    <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                        <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                        <div class="card-over"></div>
                        <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <h5
                            class="position-absolute mh-25 w-75 text-center top-100 start-50 translate-middle card-title bg-dark ms-0 rounded-pill px-3 py-2">
                            text-capitalize asda
                            <!-- TRANSFORMAR CON PHP A LOWER Y HACER UN STRINGPOS Y PONER "..." -->
                        </h5>
                    </a>
                    <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                        <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                        <div class="card-over"></div>
                        <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <h5
                            class="position-absolute mh-25 w-75 text-center top-100 start-50 translate-middle card-title bg-dark ms-0 rounded-pill px-3 py-2">
                            text-capitalize asda
                            <!-- TRANSFORMAR CON PHP A LOWER Y HACER UN STRINGPOS Y PONER "..." -->
                        </h5>
                    </a>
                    <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                        <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                        <div class="card-over"></div>
                        <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <h5
                            class="position-absolute mh-25 w-75 text-center top-100 start-50 translate-middle card-title bg-dark ms-0 rounded-pill px-3 py-2">
                            text-capitalize asda
                            <!-- TRANSFORMAR CON PHP A LOWER Y HACER UN STRINGPOS Y PONER "..." -->
                        </h5>
                    </a>
                    <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                        <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                        <div class="card-over"></div>
                        <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star"></i>
                            <i class="fas text-center fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <h5
                            class="position-absolute mh-25 w-75 text-center top-100 start-50 translate-middle card-title bg-dark ms-0 rounded-pill px-3 py-2">
                            text-capitalize asda
                            <!-- TRANSFORMAR CON PHP A LOWER Y HACER UN STRINGPOS Y PONER "..." -->
                        </h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- MEJOR 3 TIENDAS -->
    <div class="container-fluid py-5">
        <div class="container-fluid container-md">
            <div class="row justify-content-center align-content-center">
                <div class="col mb-4">
                    <h1 class="text-center h2">
                        TOP 3 Tiendas de la Semana
                    </h1>
                </div>
                <div class="d-flex flex-wrap justify-content-center align-items-center top-shop-container">
                    <a href="#" class="shop p-4 m-2 text-dark text-decoration-none rounded">
                        <div class="image bg-dark d-flex justify-content-center align-items-center">
                            <img src="img/producto3.jpg" alt="" class="cover-image" />
                        </div>

                        <div class="text mt-4 mb-3">
                            <h4 class="h3 text-center text-break">
                                Aitors shopaaaaaaaaaaaaaa
                            </h4>
                        </div>
                    </a><a href="#" class="shop p-4 m-2 text-dark text-decoration-none rounded">
                        <div class="image bg-dark d-flex justify-content-center align-items-center">
                            <img src="img/producto3.jpg" alt="" class="cover-image" />
                        </div>

                        <div class="text mt-4 mb-3">
                            <h4 class="h3 text-center text-break">
                                Aitors shopaaaaaaaaaaaaaa
                            </h4>
                        </div>
                    </a><a href="#" class="shop p-4 m-2 text-dark text-decoration-none rounded">
                        <div class="image bg-dark d-flex justify-content-center align-items-center">
                            <img src="img/producto3.jpg" alt="" class="cover-image" />
                        </div>

                        <div class="text mt-4 mb-3">
                            <h4 class="h3 text-center text-break">
                                Aitors shopaaaaaaaaaaaaaa
                            </h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- OTRAS TIENDAS -->
    <div class="container-fluid py-5 background-2">
        <div class="container-fluid container-md">
            <div class="row justify-content-center align-content-center">
                <div class="col mb-4">
                    <h1 class="text-center h2">
                        Otras Tiendas
                    </h1>
                </div>
                <div class="d-flex flex-wrap justify-content-center align-items-center">
                    @foreach ($shops as $shop)
                        <a href="{{ route('shop.index', $shop->slug) }}"
                            class="bg-dark rounded-circle border m-3 rounded-shop">
                            <img src="{{ asset('storage/' . $shop->logo) }}" class="cover-image rounded-circle"
                                alt="logo" />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- MODALS -->
    <div class="modal fade" id="categoriesModal" tabindex="-1" aria-labelledby="categoriesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
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
