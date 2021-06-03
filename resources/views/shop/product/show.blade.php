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
                    <p class="h4 text-muted fw-bold">{{ $product->price }}€</p>
                    <div class="col-md-12 ">
                        @if ($product->stock > 0)
                            <small class="text-success">En stock</small>
                        @else
                            <small class="text-danger">Fuera de Stock</small>
                        @endif
                    </div>
                    <div class="col-md-12 my-2">
                        @if (Auth::check() && Auth::user()->hasRole('seller') && Auth::user()->shop->id == $product->shop_id)
                            <button type="button" data-bs-target="#modalStockUpdate" data-bs-toggle="modal"
                                data-bs-dismiss="modal" class="btn btn-primary"> <i class="fa fa-edit text-black"></i>
                                Añadir Stock
                            </button>
                            <a href="{{ route('history.show', [$shop->slug, $product->slug]) }}"
                                class="btn btn-info w-25 ms-2">Historial</a>
                        @endif
                    </div>
                    <p class="text-break">
                        {{ $product->description }}
                    </p>
                    <p>
                        @foreach ($product->categories as $category)
                            <a class="text-muted fst-italic"
                                href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
                        @endforeach
                    </p>
                    <div class="col">
                        <p>
                            Valoración global: {{ round($product->opinions()->avg('score'), 2) / 2 }} / 5 <span
                                class="fa fa-star checked"></span>
                        </p>
                    </div>
                </div>
                <div class="col">
                    @if (Auth::check() && Auth::user()->hasAnyRole(['seller', 'admin']))
                        @if (Auth::user()->hasRole('seller') && Auth::user()->shop->id == $product->shop_id)
                            <button type="button" data-bs-target="#modalProductUpdate" data-bs-toggle="modal"
                                data-bs-dismiss="modal" class="btn btn-primary w-25"> <i class="fa fa-edit text-black"></i>
                                Modificar
                            </button>
                        @endif

                        @if ($errors->any())
                            {!! implode('', $errors->all('<span class="invalid-feedback" role="alert" style="display:block !important"> <strong>:message</strong></span><br>')) !!}
                        @endif
                    @else
                        @if (Auth::guest() || (Auth::check() && !Auth::user()->hasRole('admin')))
                            <button type="button" id="addCart" class="btn btn-success col-5">
                                Añadir al carrito
                            </button>

                            <button type="button" id="removeCart" style="display: none" class="btn btn-danger col-5">
                                Quitar del carrito
                            </button>
                        @endif
                    @endif
                    @if (Auth::check() &&
        Auth::user()->hasRole('user') &&
        $product->opinions()->where('user_id', Auth::user()->id)->count() == 0 &&
        $product->orders()->where('user_id', Auth::user()->id)->count())
                        <button type="button" data-bs-target="#modalReview" class="btn btn-primary mx-2 col-5"
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
                @if ($comments->count() < 3)
                    @foreach ($comments as $comment) <div class="mb-3 text-white
                    bg-secondary rounded p-3">
                    <div class="col-sm-4 fs-4 row">
                    <div class="col">
                    {{ $comment->user->username }}
                    </div>
                    @if (Auth::check() && Auth::user()->id == $comment->user_id)
                        <div class="col-sm-2">
                        <form method="post"
                        action="{{ route('opinion.delete', [$shop->slug, $product->slug, $comment]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"> <i class="fa fa-trash
                        text-black"></i> </button>
                        </form>
                        </div>
                        <div class="col-sm-2">
                        <button type="button" data-bs-target="#modalReviewUpdate1"
                        data-bs-toggle="modal"
                        data-bs-dismiss="modal" class="btn"> <i class="fa fa-edit
                        text-black"></i></button>
                        </div>
                        <!-- ---- UPDATE REVIEW -->
                        <div class="modal fade" id="modalReviewUpdate1" aria-hidden="true"
                        aria-labelledby="modalReviewUpdate1" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añade una review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form
                        action="{{ route('opinion.update', [$shop->slug, $product->slug, $comment]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <h4 class="mt-4 text-center text-dark">Puntuación</h4>
                        <fieldset class="rating"> <input type="radio" id="star5"
                        name="score" value="10" /><label
                        class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half"
                        name="score" value="9" /><label class="half"
                        for="star4half"
                        title="Pretty good - 4.5 stars"></label> <input type="radio"
                        id="star4" name="score"
                        value="8" /><label class="full" for="star4" title="Pretty
                        good - 4 stars"></label> <input
                        type="radio" id="star3half" name="score" value="7"
                        /><label class="half" for="star3half"
                        title="Meh - 3.5 stars"></label> <input type="radio"
                        id="star3" name="score" value="6" /><label
                        class="full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half"
                        name="score" value="5" /><label class="half"
                        for="star2half"
                        title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="score" value="4"
                        /><label class="full" for="star2"
                        title="Kinda bad - 2 stars"></label> <input type="radio"
                        id="star1half" name="score"
                        value="3" /><label class="half" for="star1half" title="Meh
                        - 1.5 stars"></label> <input
                        type="radio" id="star1" name="score" value="2"
                        /><label class="full" for="star1"
                        title="Sucks big time - 1 star"></label> <input type="radio"
                        id="starhalf" name="score"
                        value="1" /><label class="half" for="starhalf" title="Sucks
                        big time - 0.5 stars"></label>
                        </fieldset>
                        <input type="hidden" name="product_id"
                        value="{{ $product->id }}">
                        <br />
                        <label for="" class="form-label mt-2 fw-bold
                        text-dark">Opinión</label>
                        <input type="text" name="comment"
                        value="{{ $comment->comment }}" class="form-control" />
                        <button type="submit" class="btn btn-secondary align-self-start mt-3">
                        Enviar opinión
                        </button>
                        </form>
                        </div>
                        </div>
                        </div>
                        </div> @endif
            </div>

            <div class="row">
                <div class="col p-2">
                    <div class="d-inline ps-1">
                        @if (round($comment->score, 2) / 2 <= 0.5)
                            <i class="fa fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        @elseif (round($comment->score,2) / 2 <= 1) <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @elseif (round($comment->score,2) / 2 <= 1.5) <i class="fas fa-star"></i>
                                    <i class="fa fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                @elseif (round($comment->score,2) / 2 <= 2) <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @elseif (round($comment->score,2) / 2 <= 2.5) <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fa fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif (round($comment->score,2) / 2 <= 3) <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif (round($comment->score,2) / 2 <= 3.5) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fa fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif (round($comment->score,2) / 2 <= 4) <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    @elseif (round($comment->score,2) / 2 <= 4.5) <i
                                                            class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                        @elseif(round($comment->score,2) / 2 <= 5) <i
                                                                class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                        @endif
                    </div>
                    <span class="m-4">
                        @if ($currentTime->diffInMinutes($comment->created_at) < 60)
                            hace {{ $currentTime->diffInMinutes($comment->created_at) }}
                            @if ($currentTime->diffInMinutes($comment->created_at) == 1) minuto
                        @else
                            minutos @endif
                        @elseif($currentTime->diffInHours($comment->created_at) < 24) hace
                                {{ $currentTime->diffInHours($comment->created_at) }} @if ($currentTime->diffInHours($comment->created_at) == 1) hora
                    @else
                        horas @endif @else hace {{ $currentTime->diffInDays($comment->created_at) }}
                                @if ($currentTime->diffInDays($comment->created_at) == 1)
                                día
                            @else
                                días
                        @endif
                        @endif
                    </span>
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
        @for ($i = 0; $i < 2; $i++)
            <div class="mb-3 text-white bg-secondary rounded p-3">
                <div class="col-sm-4 fs-4 row">
                    <div class="col">
                        {{ $comments[$i]->user->username }}
                    </div>
                    @if (Auth::user()->id == $comments[$i]->user_id)
                        <div class="col-sm-2">
                            <form method="post"
                                action="{{ route('opinion.delete', [$shop->slug, $product->slug, $comments[$i]]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"> <i class="fa fa-trash text-black"></i> </button>
                            </form>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" data-bs-target="#modalReviewUpdate" data-bs-toggle="modal"
                                data-bs-dismiss="modal" class="btn"> <i class="fa fa-edit text-black"></i></button>
                        </div>
                        <!-- ---- UPDATE REVIEW -->
                        <div class="modal fade" id="modalReviewUpdate" aria-hidden="true"
                            aria-labelledby="modalReviewUpdate" tabindex="-1">
                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Añade una review</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('opinion.update', [$shop->slug, $product->slug, $comments[$i]]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <h4 class="mt-4 text-center text-dark">Puntuación</h4>
                                            <fieldset class="rating"> <input type="radio" id="star5" name="score"
                                                    value="10" /><label class="full" for="star5"
                                                    title="Awesome - 5 stars"></label> <input type="radio" id="star4half"
                                                    name="score" value="9" /><label class="half" for="star4half"
                                                    title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4"
                                                    name="score" value="8" /><label class="full" for="star4"
                                                    title="Pretty good - 4 stars"></label> <input type="radio"
                                                    id="star3half" name="score" value="7" /><label class="half"
                                                    for="star3half" title="Meh - 3.5 stars"></label> <input type="radio"
                                                    id="star3" name="score" value="6" /><label class="full" for="star3"
                                                    title="Meh - 3 stars"></label> <input type="radio" id="star2half"
                                                    name="score" value="5" /><label class="half" for="star2half"
                                                    title="Kinda bad - 2.5 stars"></label>
                                                <input type="radio" id="star2" name="score" value="4" /><label class="full"
                                                    for="star2" title="Kinda bad - 2 stars"></label> <input type="radio"
                                                    id="star1half" name="score" value="3" /><label class="half"
                                                    for="star1half" title="Meh - 1.5 stars"></label> <input type="radio"
                                                    id="star1" name="score" value="2" /><label class="full" for="star1"
                                                    title="Sucks big time - 1 star"></label> <input type="radio"
                                                    id="starhalf" name="score" value="1" /><label class="half"
                                                    for="starhalf" title="Sucks big time - 0.5 stars"></label>
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
        @for ($i = 2; $i < $comments->count(); $i++)
            <div class="mb-3 text-white bg-secondary multicollapse rounded p-3 collapse">
                <div class="col-sm-4 fs-4 row">
                    <div class="col">
                        {{ $comments[$i]->user->username }}
                    </div>
                    @if (Auth::user()->id == $comments[$i]->user_id)
                        <div class="col-sm-2">
                            <form method="post"
                                action="{{ route('opinion.delete', [$shop->slug, $product->slug, $comments[$i]]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"> <i class="fa fa-trash text-black"></i> </button>
                            </form>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" data-bs-target="#modalReviewUpdate" data-bs-toggle="modal"
                                data-bs-dismiss="modal" class="btn"> <i class="fa fa-edit text-black"></i></button>
                        </div>

                    @endif
                </div>

                <div class="row">
                    <div class="col p-2">
                        <div class="d-inline ps-1">
                            @if (round($comments[$i]->score, 2) / 2 <= 0.5)
                                <i class="fa fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @elseif (round($comments[$i]->score,2) / 2 <= 1) <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                @elseif (round($comments[$i]->score,2) / 2 <= 1.5) <i class="fas fa-star"></i>
                                        <i class="fa fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    @elseif (round($comments[$i]->score,2) / 2 <= 2) <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif (round($comments[$i]->score,2) / 2 <= 2.5) <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fa fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            @elseif (round($comments[$i]->score,2) / 2 <= 3) <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                @elseif (round($comments[$i]->score,2) / 2 <= 3.5) <i
                                                        class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fa fa-star-half-alt"></i>
                                                        <i class="far fa-star"></i>
                                                    @elseif (round($comments[$i]->score,2) / 2 <= 4) <i
                                                            class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        @elseif (round($comments[$i]->score,2) / 2 <= 4.5) <i
                                                                class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fa fa-star-half-alt"></i>
                                                            @elseif(round($comments[$i]->score,2) / 2 <= 5) <i
                                                                    class="fas fa-star"></i>
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
        @if ($product->opinions()->whereNotNull('score')->count())
            @if ($product->opinions()->count() > 2)
                <a data-bs-toggle="collapse" id="ver-mas" role="button" data-bs-target=".multicollapse"
                    aria-expanded="false" aria-controls="collapseExample"><small class="text-info"><u>Ver más</u></small>
                </a>

                <a data-bs-toggle="collapse" role="button" data-bs-target=".multicollapse" aria-expanded="false"
                    aria-controls="collapseExample" id="ver-menos"><small class="text-info"><u>Ver menos</u></small>
                </a>
            @endif
        @else
            <div class="alert alert-warning text-center">No hay opiniones de este producto</div>
        @endif

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
                                class="full" for="star5" title="Awesome - 5 stars"></label> <input type="radio"
                                id="star4half" name="score" value="9" /><label class="half" for="star4half"
                                title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4" name="score"
                                value="8" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> <input
                                type="radio" id="star3half" name="score" value="7" /><label class="half" for="star3half"
                                title="Meh - 3.5 stars"></label> <input type="radio" id="star3" name="score"
                                value="6" /><label class="full" for="star3" title="Meh - 3 stars"></label> <input
                                type="radio" id="star2half" name="score" value="5" /><label class="half" for="star2half"
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
    <!-- ---- Product Modal FALTA AUTOFOCUS Y MOSTRAR ERRORES -->
    <div class="modal fade" id="modalProductUpdate" tabindex="-1" aria-labelledby="modalProductUpdate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">
                        Modificar Producto
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('shop.product.update', [$shop->slug, $product->slug]) }}" method="POST"
                    enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <div class="col-md-12 my-3">
                            <label for="name" class="form-label">Nombre</label>
                            <div class="input-group">
                                <input type="text" class="form-control" minlength="3" name="name" id="name" placeholder=""
                                    value="{{ $product->name }}" />
                            </div>
                        </div>
                        <div class="col-md-12 my-3">
                            <label for="description" class="form-label">Descripción</label>
                            <div class="input-group">
                                <input type="text" class="form-control" minlength="20" name="description" id="description"
                                    placeholder="" value="{{ $product->description }}" />
                            </div>
                        </div>
                        <div class="col-md-12 my-3">
                            <label for="description" class="form-label">Precio</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="price" id="" placeholder=""
                                    value="{{ $product->price }}" />
                            </div>
                        </div>
                        <div class="col-md-12 my-3">
                            <h3 class="form-label mb-2">Categorias</h3>
                            @foreach ($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input categories-checkbox" type="checkbox" name="categories[]"
                                        id="product_category-{{ $category->id }}" value="{{ $category->id }}">
                                    <label class="form-check-label fw-normal"
                                        for="product_category-{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 my-3">
                            <label for="image" class="form-label">Imagen <span class="text-muted">(650px x
                                    400px)</span></label>
                            <input type="file" class="form-control" id="image" name="image" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ---- Stock Modal -->
    <div class="modal fade" id="modalStockUpdate" tabindex="-1" aria-labelledby="modalStockUpdate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">
                        Actualizar Stock
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('shop.product.updateStock', [$shop->slug, $product->slug]) }}" method="POST"
                    class="row g-3">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <div class="col-md-12 my-3">
                            <label for="description" class="form-label">Stock</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="stock" id="stock" placeholder="10" min="1"
                                    max="1000" required />
                            </div>
                            <span class="text-muted">Introduce la cantidad que quieres
                                añadir</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Guardar cambios
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

            //autofocus stock modal
            var myModal = document.getElementById('modalStockUpdate')
            var myInput = document.getElementById('stock')

            myModal.addEventListener('shown.bs.modal', function() {
                myInput.focus()
            })

            //autofocus modalProductUpdate modal
            var myModal2 = document.getElementById('modalProductUpdate')
            var myInput = document.getElementById('name')

            myModal2.addEventListener('shown.bs.modal', function() {
                myInput.focus()
            })


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
        $("#ver-menos").hide()
        $("#ver-mas").on("click", function() {
            $(this).hide()
            $("#ver-menos").show()
        })
        $("#ver-menos").on("click", function() {
            $(this).hide()
            $("#ver-mas").show()
        });

        $("#product_image").change(function() {
            previewImage("product_image");
        });

        @if (Auth::check() && Auth::user()->hasRole('seller'))
            $('#formProduct').on('submit', function(e) {
            let valid = true;
        
            if (!$(".categories-checkbox:checked").length) {
            alert("¡Tienes que seleccionar al menos una categoria!");
            valid = false;
            }
            if ($(".categories-checkbox:checked").length > 5) {
            alert("¡Solo puedes seleccionar un máximo de 5 categorías!");
            valid = false;
            }
        
            if (!valid) {
            e.preventDefault();
            }
            });
        @endif

    </script>
@endsection
