@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <style>
        /* @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
                                                                                                                                            @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700); */

        .rating {
            border: none;
            margin-right: 49px
        }

        .myratings {
            font-size: 85px;
            color: green
        }

        .rating>[id^="star"] {
            display: none
        }

        .rating>label:before {
            margin: 5px;
            font-size: 2.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005"
        }

        .rating>.half:before {
            content: "\f089";
            position: absolute
        }

        .rating>label {
            color: #ddd;
            float: right
        }

        .rating>[id^="star"]:checked~label,
        .rating:not(:checked)>label:hover,
        .rating:not(:checked)>label:hover~label {
            color: #FFD700
        }

        .rating>[id^="star"]:checked+label:hover,
        .rating>[id^="star"]:checked~label:hover,
        .rating>label:hover~[id^="star"]:checked~label,
        .rating>[id^="star"]:checked~label:hover~label {
            color: #FFED85
        }

    </style>
    @include('includes.navbar-shop')
    <!-- PRODUCT -->
    <div class="container-sm container-fluid mb-3 px-4">
        <div class="row mt-5 h-100">
            <div class="col-12 col-md-6 bg-dark border rounded mb-md-0 mb-4 p-0" style="height:25rem">
                <img src="{{ asset('storage/' . $product->image) }}" class="cover-image"
                    alt="Imagen del producto {{ $product->name }}, de la tienda {{ $shop->name }}" />
            </div>
            <div class="col-12 col-md-6 h-100 d-flex flex-column ml-md ps-0 ps-md-5">
                <div class="row">
                    <p class="h4 text-break">{{ $product->name }}</p>
                    @if ($product->stock > 0)
                        <small class="text-success">En stock</small>
                    @else
                        <small class="text-danger">Fuera de Stock</small>
                    @endif
                    <p class="text-break">
                        {{ $product->description }}
                    </p>
                    <p>
                        @foreach ($product->categories as $category)
                            <a class="text-muted fst-italic"
                                href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
                        @endforeach
                    </p>
                </div>
                <div class="col">
                    <p>
                        Valoración global: {{ round($product->opinions()->avg('score'), 2) }} / 5 <span
                            class="fa fa-star checked"></span>
                    </p>
                </div>
                <div class="row justify-self-end d-flex justify-content">
                    <button type="button" id="addCart" class="btn btn-success mx-2 col-5">
                        Añadir al carrito
                    </button>
                    <button type="button" id="removeCart" style="display: none" class="btn btn-danger mx-2 col-5">
                        Quitar del carrito
                    </button>
                    <button type="button" class="btn btn-secondary mx-2 col-5" data-bs-target="#modalReview"
                        data-bs-toggle="modal" data-bs-dismiss="modal">
                        Añadir una review
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- REVIEWS -->
    <div class="container-fluid bg-dark mt-5 mb-4">
        <h3 class="text-center text-white p-5">Reviews</h3>
    </div>
    <div class="container-fluid p-3">
        <div class="container-md container-fluid">
            <div class="container-md">
                <div class="mb-3 text-white bg-secondary rounded p-3">
                    <div class="col-sm-2 fs-4">Username</div>
                    <div class="row">
                        <div class="col p-2">
                            <div class="d-inline ps-1">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="m-4">Revisado en 12/04/05</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-break">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos
                            eaque molestias fugit natus quod earum ducimus reprehenderit
                            voluptatem. Enim inventore harum incidunt tenetur odio, ullam
                            placeat iure ad aperiam eius?
                        </p>
                    </div>
                </div>
                <div class="mb-3 text-white bg-secondary rounded p-3">
                    <div class="col-sm-2 fs-4">Username</div>
                    <div class="row">
                        <div class="col p-2">
                            <div class="d-inline ps-1">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="m-4">Revisado en 12/04/05</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-break">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos
                            eaque molestias fugit natus quod earum ducimus reprehenderit
                            voluptatem. Enim inventore harum incidunt tenetur odio, ullam
                            placeat iure ad aperiam eius?
                        </p>
                    </div>
                </div>
                <div class="mb-3 text-white bg-secondary multicollapse rounded p-3 collapse">
                    <div class="col-sm-2 fs-4">Username</div>
                    <div class="row">
                        <div class="col p-2">
                            <div class="d-inline ps-1">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="m-4">Revisado en 12/04/05</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-break">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos
                            eaque molestias fugit natus quod earum ducimus reprehenderit
                            voluptatem. Enim inventore harum incidunt tenetur odio, ullam
                            placeat iure ad aperiam eius?
                        </p>
                    </div>
                </div>
                <div class="mb-3 text-white bg-secondary rounded multicollapse p-3 collapse">
                    <div class="col-sm-2 fs-4">Username</div>
                    <div class="row">
                        <div class="col p-2">
                            <div class="d-inline ps-1">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="m-4">Revisado en 12/04/05</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-break">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos
                            eaque molestias fugit natus quod earum ducimus reprehenderit
                            voluptatem. Enim inventore harum incidunt tenetur odio, ullam
                            placeat iure ad aperiam eius?
                        </p>
                    </div>
                </div>
                <div class="mb-3 text-white bg-secondary rounded multicollapse p-3 collapse">
                    <div class="col-sm-2 fs-4">Username</div>
                    <div class="row">
                        <div class="col p-2">
                            <div class="d-inline ps-1">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="m-4">Revisado en 12/04/05</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-break">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos
                            eaque molestias fugit natus quod earum ducimus reprehenderit
                            voluptatem. Enim inventore harum incidunt tenetur odio, ullam
                            placeat iure ad aperiam eius?
                        </p>
                    </div>
                </div>
                <div class="mb-3 text-white bg-secondary rounded multicollapse p-3 collapse">
                    <div class="col-sm-2 fs-4">Username</div>
                    <div class="row">
                        <div class="col p-2">
                            <div class="d-inline ps-1">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="m-4">Revisado en 12/04/05</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-break">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos
                            eaque molestias fugit natus quod earum ducimus reprehenderit
                            voluptatem. Enim inventore harum incidunt tenetur odio, ullam
                            placeat iure ad aperiam eius?
                        </p>
                    </div>
                </div>
                <a data-bs-toggle="collapse" role="button" data-bs-target=".multicollapse" aria-expanded="false"
                    aria-controls="collapseExample"><small class="text-info"><u>Ver más</u></small>
                </a>
            </div>
        </div>
    </div>
    <!-- MODALS -->
    <!-- ---- REVIEW -->
    <div class="modal fade" id="modalReview" aria-hidden="true" aria-labelledby="modalReview" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añade una review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h4 class="mt-1">Puntuación</h4>
                    <fieldset class="rating"> <input type="radio" required id="star5" name="rating" value="10" /><label
                            class="full" for="star5" title="Awesome - 5 stars"></label> <input type="radio" id="star4half"
                            name="rating" value="9" /><label class="half" for="star4half"
                            title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4" name="rating"
                            value="8" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> <input
                            type="radio" id="star3half" name="rating" value="7" /><label class="half" for="star3half"
                            title="Meh - 3.5 stars"></label> <input type="radio" id="star3" name="rating" value="6" /><label
                            class="full" for="star3" title="Meh - 3 stars"></label> <input type="radio" id="star2half"
                            name="rating" value="5" /><label class="half" for="star2half"
                            title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="4" /><label class="full" for="star2"
                            title="Kinda bad - 2 stars"></label> <input type="radio" id="star1half" name="rating"
                            value="3" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> <input
                            type="radio" id="star1" name="rating" value="2" /><label class="full" for="star1"
                            title="Sucks big time - 1 star"></label> <input type="radio" id="starhalf" name="rating"
                            value="1" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary align-self-start">
                            Enviar opinión
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extraFooter')
    <script>
        $(document).ready(function() {
            var productId = "{{ $product->id }}"

            //Mirar si ya tiene el producto
            if (checkProductCart(productId)) {
                $("#addCart").hide();
                $("#removeCart").show();
            } else {
                $("#removeCart").hide();
                $("#addCart").show();
            }
            //Añadir Carrito

            $("#addCart").on("click", () => {
                addProductCart(productId);

                $("#addCart").hide();
                $("#removeCart").show();
            });

            $("#removeCart").on("click", () => {
                removeProductCart(productId);

                $("#removeCart").hide();
                $("#addCart").show();
            });

            //Estrellas
            $("input[type='radio']").click(function() {
                var sim = $("input[type='radio']:checked").val();
                //alert(sim);
                if (sim < 3) {
                    $('.myratings').css('color', 'red');
                    $(".myratings").text(sim);
                } else {
                    $('.myratings').css('color', 'green');
                    $(".myratings").text(sim);
                }
            });
        });

    </script>
@endsection
