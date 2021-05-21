@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- NAV TIENDA -->
    <div class="text-center container-fluid container-md my-3 d-flex justify-content-center align-items-center flex-wrap">
        <a href="{{ route('shop.index', $shop->slug) }}"><img class="img me-3" src="{{asset('storage/'. $shop->logo) }}" alt="logo_shop"></a>
        <h2 class="navbar-brand link-dark fs-1 fw-normal text-dark me-2">
            {{ $shop->name }}
        </h2>
        <button class="navbar-toggler justify-content-center align-content-center" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
            <span class="fas fa-search"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center align-content-center" id="navbarSupportedContent2">
            <div class="col-sm-6 my-2 mx-auto">
                <div class="position-relative">
                    <input class="form-control me-2 search rounded-pill bg-secondary ps-5 py-2 my-2 my-md-0" type="search"
                        placeholder="Buscar" aria-label="Search" />
                    <span class="position-absolute top-50 start-0 translate-middle-y ms-4 text-black-50">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN NAV TIENDA -->
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
                        <div class="item">
                            <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                                <img class="card-image" src="'img/producto3.jpg'{{-- {{ asset('img/producto3.jpg') }} --}}" alt="Card image" />
                                <div class="card-over"></div>
                                <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <h5
                                    class="position-absolute mh-25 w-75 text-center top-100 start-50 translate-middle card-title bg-dark ms-0 rounded-pill px-3 py-2 text-capitalize">
                                    text-capitalize asda{{-- {{ Auth::user()->product->name }} --}}
                                    <!-- TRANSFORMAR CON PHP A LOWER Y HACER UN STRINGPOS Y PONER "..." -->
                                </h5>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                                <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                                <div class="card-over"></div>
                                <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
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
                        <div class="item">
                            <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                                <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                                <div class="card-over"></div>
                                <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
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
                        <div class="item">
                            <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                                <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                                <div class="card-over"></div>
                                <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
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
                        <div class="item">
                            <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                                <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                                <div class="card-over"></div>
                                <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
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
                        <div class="item">
                            <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                                <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                                <div class="card-over"></div>
                                <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
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
                <div class="d-flex flex-wrap justify-content-center align-items-center">
                    <a href="#" class="card card-product border text-white position-relative mb-5 p-0">
                        <img class="card-image" src="img/producto3.jpg" alt="Card image" />
                        <div class="card-over"></div>
                        <div class="card-stars text-warning position-absolute top-0 end-0 p-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
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
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
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
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
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
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
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
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
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
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
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
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
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
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
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
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
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
            <div class="row justify-content-center align-content-center mt-3">
                <!-- BLADE PAGINATION -->
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">2</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('extraFooter')
    <script>
        console.log("fuera");
        $(document).ready(function() {
            console.log("dentro");
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
