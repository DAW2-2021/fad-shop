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
