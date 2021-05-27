@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
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
                        Valoración global: {{ (round($product->opinions()->avg('score'), 2) / 2) }} / 5 <span
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

                    @if (Auth::check() && !Auth::user()->hasAnyRole(['seller', 'admin']) && $product->opinions()->where('user_id', Auth::user()->id)->count() == 0)
                    <button type="button" class="btn btn-secondary mx-2 col-5" data-bs-target="#modalReview"
                        data-bs-toggle="modal" data-bs-dismiss="modal">
                        Añadir una review
                    </button>
                    @endif
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
                @if ($comments->count() <3)
                @foreach ($comments as $comment)
                <div class="mb-3 text-white bg-secondary rounded p-3">
                    <div class="col-sm-4 fs-4 row">
                    <div class="col">
                        {{ $comment->user->username }} 
                    </div>
                        @if (Auth::user()->id == $comment->user_id)
                            <div class="col-sm-2">
                                <form method="post" action="{{ route('opinion.delete', [ $shop->slug, $product->slug, $comment]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"> <i class="fa fa-trash text-black"></i> </button>
                                </form>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" data-bs-target="#modalReviewUpdate1" data-bs-toggle="modal" 
                                data-bs-dismiss="modal"  class="btn"> <i class="fa fa-edit text-black"></i></button>
                            </div>
                            <!-- ---- UPDATE REVIEW -->
                            <div class="modal fade" id="modalReviewUpdate1" aria-hidden="true" aria-labelledby="modalReviewUpdate1" tabindex="-1">
                                <div class="modal-dialog  modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Añade una review</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('opinion.update', [$shop->slug, $product->slug, $comment]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <h4 class="mt-4 text-center text-dark">Puntuación</h4>
                                                <fieldset class="rating"> <input type="radio" id="star5" name="score" value="10" /><label
                                                        class="full" for="star5" title="Awesome - 5 stars"></label> <input type="radio" id="star4half"
                                                        name="score" value="9" /><label class="half" for="star4half"
                                                        title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4" name="score"
                                                        value="8" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> <input
                                                        type="radio" id="star3half" name="score" value="7" /><label class="half" for="star3half"
                                                        title="Meh - 3.5 stars"></label> <input type="radio" id="star3" name="score" value="6" /><label
                                                        class="full" for="star3" title="Meh - 3 stars"></label> <input type="radio" id="star2half"
                                                        name="score" value="5" /><label class="half" for="star2half"
                                                        title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="score" value="4" /><label class="full" for="star2"
                                                        title="Kinda bad - 2 stars"></label> <input type="radio" id="star1half" name="score"
                                                        value="3" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> <input
                                                        type="radio" id="star1" name="score" value="2" /><label class="full" for="star1"
                                                        title="Sucks big time - 1 star"></label> <input type="radio" id="starhalf" name="score"
                                                        value="1" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <br />
                                                <label for="" class="form-label mt-2 fw-bold text-dark">Opinión</label>
                                                <input type="text" name="comment" class="form-control" />
                                                <button type="submit" class="btn btn-secondary align-self-start mt-3">
                                                    Enviar opinión
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <div class="row">
                        <div class="col p-2">
                            <div class="d-inline ps-1">
                                @if (round($comment->score) / 2  <= 0.51)
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif (round($comment->score / 2 ) <= 0.99) <i
                                                class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif (round($comment->score / 2 ) <= 1.49) <i
                                                    class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif (round($comment->score / 2 ) <= 1.99) <i
                                                        class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    @elseif (round($comment->score / 2 ) <= 2.49) <i
                                                            class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        @elseif (round($comment->score / 2 ) <= 2.99)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            @elseif (round($comment->score / 2 ) <=
                                                                    3.49) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                @elseif (round($comment->score / 2 ) <=
                                                                        3.99) <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    @elseif (round($comment->score / 2 ) <= 4.49) <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                        @elseif(round($comment->score / 2 ) <= 4.99) <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star-half-alt"></i>
                                                                            @elseif(round($comment->score / 2 ) == 5)
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>

                                        @endif
                            </div>
                            <span class="m-4">Revisado en {{ $comment->created_at }}</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-break">
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
                @endforeach
                @else
                @for ($i=0; $i<2; $i++)
                <div class="mb-3 text-white bg-secondary rounded p-3">
                    <div class="col-sm-4 fs-4 row">
                        <div class="col">
                            {{ $comments[$i]->user->username }}
                        </div>
                        @if (Auth::user()->id == $comments[$i]->user_id)
                            <div class="col-sm-2">
                                <form method="post" action="{{ route('opinion.delete', [ $shop->slug, $product->slug, $comments[$i]]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"> <i class="fa fa-trash text-black"></i> </button>
                                </form>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" data-bs-target="#modalReviewUpdate" data-bs-toggle="modal" 
                                data-bs-dismiss="modal"  class="btn"> <i class="fa fa-edit text-black"></i></button>
                            </div>
                            <!-- ---- UPDATE REVIEW -->
                            <div class="modal fade" id="modalReviewUpdate" aria-hidden="true" aria-labelledby="modalReviewUpdate" tabindex="-1">
                                <div class="modal-dialog  modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Añade una review</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('opinion.update', [$shop->slug, $product->slug, $comments[$i]]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <h4 class="mt-4 text-center text-dark">Puntuación</h4>
                                                <fieldset class="rating"> <input type="radio" id="star5" name="score" value="10" /><label
                                                        class="full" for="star5" title="Awesome - 5 stars"></label> <input type="radio" id="star4half"
                                                        name="score" value="9" /><label class="half" for="star4half"
                                                        title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4" name="score"
                                                        value="8" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> <input
                                                        type="radio" id="star3half" name="score" value="7" /><label class="half" for="star3half"
                                                        title="Meh - 3.5 stars"></label> <input type="radio" id="star3" name="score" value="6" /><label
                                                        class="full" for="star3" title="Meh - 3 stars"></label> <input type="radio" id="star2half"
                                                        name="score" value="5" /><label class="half" for="star2half"
                                                        title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="score" value="4" /><label class="full" for="star2"
                                                        title="Kinda bad - 2 stars"></label> <input type="radio" id="star1half" name="score"
                                                        value="3" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> <input
                                                        type="radio" id="star1" name="score" value="2" /><label class="full" for="star1"
                                                        title="Sucks big time - 1 star"></label> <input type="radio" id="starhalf" name="score"
                                                        value="1" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                </fieldset>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <br />
                                                <label for="" class="form-label mt-2 fw-bold text-dark">Opinión</label>
                                                <input type="text" name="comment" class="form-control" />
                                                <button type="submit" class="btn btn-secondary align-self-start mt-3">
                                                    Enviar opinión
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col p-2">
                            <div class="d-inline ps-1">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="m-4">Revisado en {{ $comments[$i]->created_at }}</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-break">
                            {{ $comments[$i]->comment }}
                        </p>
                    </div>
                </div>
                
                @endfor
                @for ($i=2; $i<$comments->count(); $i++)
                <div class="mb-3 text-white bg-secondary multicollapse rounded p-3 collapse">
                    <div class="col-sm-4 fs-4 row">
                    <div class="col">
                        {{ $comments[$i]->user->username }} 
                    </div>
                        @if (Auth::user()->id == $comments[$i]->user_id)
                            <div class="col-sm-2">
                                <form method="post" action="{{ route('opinion.delete', [ $shop->slug, $product->slug, $comments[$i]]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"> <i class="fa fa-trash text-black"></i> </button>
                                </form>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" data-bs-target="#modalReviewUpdate" data-bs-toggle="modal" 
                                data-bs-dismiss="modal"  class="btn"> <i class="fa fa-edit text-black"></i></button>
                            </div>
                            
                        @endif
                    </div>
                    
                    <div class="row">
                        <div class="col p-2">
                            <div class="d-inline ps-1">
                                @if (round($comments[$i]->score / 2 ) <= 0.51)
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif (round($comments[$i]->score / 2 ) <= 0.99) <i
                                                class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif (round($comments[$i]->score / 2 ) <= 1.49) <i
                                                    class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif (round($comments[$i]->score / 2 ) <= 1.99) <i
                                                        class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    @elseif (round($comments[$i]->score / 2 ) <= 2.49) <i
                                                            class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        @elseif (round($comments[$i]->score / 2 ) <= 2.99)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            @elseif (round($comments[$i]->score / 2 ) <=
                                                                    3.49) <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                @elseif (round($comments[$i]->score / 2 ) <=
                                                                        3.99) <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                    @elseif (round($comments[$i]->score / 2 ) <= 4.49) <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                        @elseif(round($comments[$i]->score / 2 ) <= 4.99) <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star-half-alt"></i>
                                                                            @elseif(round($comments[$i]->score / 2 ) == 5)
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>

                                        @endif
                            </div>
                            <span class="m-4">Revisado en {{ $comments[$i]->created_at }}</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-break">
                            {{ $comments[$i]->comment }}
                        </p>
                    </div>
                </div>
                @endfor
                @endif
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
                <div class="modal-body">
                    <form action="{{ route('opinion.store', [$shop->slug, $product->slug]) }}" method="POST">
                        @csrf
                        @method('POST')
                        <h4 class="mt-4 text-center">Puntuación</h4>
                        <fieldset class="rating"> <input type="radio" required id="star5" name="score" value="10" /><label
                                class="full" for="star5" title="Awesome - 5 stars"></label> <input type="radio" id="star4half"
                                name="score" value="9" /><label class="half" for="star4half"
                                title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4" name="score"
                                value="8" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> <input
                                type="radio" id="star3half" name="score" value="7" /><label class="half" for="star3half"
                                title="Meh - 3.5 stars"></label> <input type="radio" id="star3" name="score" value="6" /><label
                                class="full" for="star3" title="Meh - 3 stars"></label> <input type="radio" id="star2half"
                                name="score" value="5" /><label class="half" for="star2half"
                                title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="score" value="4" /><label class="full" for="star2"
                                title="Kinda bad - 2 stars"></label> <input type="radio" id="star1half" name="score"
                                value="3" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> <input
                                type="radio" id="star1" name="score" value="2" /><label class="full" for="star1"
                                title="Sucks big time - 1 star"></label> <input type="radio" id="starhalf" name="score"
                                value="1" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                        </fieldset>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <br />
                        <label for="" class="form-label mt-2 fw-bold">Opinión</label>
                        <input type="text" name="comment" class="form-control" />
                        <button type="submit" class="btn btn-secondary align-self-start mt-3">
                            Enviar opinión
                        </button>
                    </form>
                </div>
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
