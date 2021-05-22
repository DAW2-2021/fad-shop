@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    @include('includes.navbar-shop')
    <!-- PRODUCT -->
    <div class="container-sm container-fluid mb-3 px-4">
        <div class="row mt-5 h-100">
            <div class="col-12 col-md-6 bg-dark border rounded mb-md-0 mb-4 p-0" style="height:25rem">
                <img src="img/producto.jpg" class="cover-image" alt="" />
            </div>
            <div class="col-12 col-md-6 h-100 d-flex flex-column ml-md ps-0 ps-md-5">
                <div class="row">
                    <p class="h4">Product name</p>
                    <small class="text-success">En stock</small>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis
                        optio vel neque, ipsa, eius consectetur explicabo asperiores quis
                        saepe, incidunt fugiat corporis doloribus aliquid sit nostrum eos
                        ex tenetur at?
                    </p>
                </div>
                <div class="col">
                    <p>
                        Valoración global: 185 <span class="fa fa-star checked"></span>
                    </p>
                </div>
                <div class="row justify-self-end d-flex justify-content">
                    <button type="button" class="btn btn-success mx-2 col-5">
                        Añadir al carrito
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
                <div class="modal-body">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <br />
                    <label for="" class="form-label mt-2">Opinión</label>
                    <input type="text" class="form-control" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary align-self-start">
                        Enviar opinión
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extraFooter')

@endsection
