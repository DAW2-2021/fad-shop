@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- AJUSTES PROFILE -->
    <div class="container">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Estado Petición</h1>
        </div>
        <div class="row">
            <div class="card @if ($petition->status == 'pending') bg-warning
                text-dark
            @elseif ($petition->status == 'accepted') text-white bg-success
            @elseif ($petition->status == 'rejected') text-white bg-danger @endif

                mb-3">
                <div class="col card-header d-flex">
                    <div class="w-50 text-capitalize d-flex fw-bold">{{ $petition->user->username }}</div>
                    <div class="w-50 text-capitalize d-flex flex-row-reverse fw-bold">{{ $petition->status }}</div>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Nombre de la tienda</h5>
                    <p class="card-text">{{ $petition->shop_name }}</p>

                    <h5 class="card-title fw-bold">Logo</h5>
                    <p class="card-text"><img src="{{ asset('storage/' . $petition->shop_logo) }}" alt="Logo"></p>
                    <h5 class="card-title fw-bold">Frontal del DNI</h5>
                    <p class="card-text"><img src="{{ asset('storage/' . $petition->dni_front) }}" alt="Logo">
                    </p>
                    <h5 class="card-title fw-bold">Reverso del DNI</h5>
                    <p class="card-text"><img src="{{ asset('storage/' . $petition->dni_back) }}" alt="Logo">
                    </p>

                    <h5 class="card-title fw-bold">Descripción</h5>
                    <p class="card-text">{{ $petition->shop_description }}</p>

                    @if ($petition->motivo)
                        <h5 class="card-title fw-bold">Motivo</h5>
                        <p class="card-text">{{ $petition->motivo }}</p>
                    @endif

                    <h5 class="card-title fw-bold">Fecha de creación</h5>
                    <p class="card-text">{{ $petition->created_at }}</p>

                    @if ($petition->status != 'pending')
                        <h5 class="card-title fw-bold">Fecha de modificación</h5>
                        <p class="card-text">{{ $petition->updated_at }}</p>
                    @endif

                </div>
                <div class="card-footer d-flex jus">
                    @if ($petition->status == 'pending')
                        <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#modalModifyPetition"
                            type="submit">Modificar petición</button>
                        <form class="m-2" action="{{ route('shop.admin.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="petition_id" value="{{ $petition->id }}">
                            <button class="btn btn-success" type="submit">Aceptar petición</button>
                        </form>
                        <form class="m-2" action="{{ route('petition.admin.reject', $petition->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button class="btn btn-danger" type="submit">Rechazar petición</button>
                        </form>
                    @elseif ($petition->status == 'rejected')
                        <form action="{{ route('petition.admin.pending', $petition->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button class="btn btn-warning" type="submit">Pasar petición a pendiente</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        {{-- modal modificar --}}
        @if ($petition->status == 'pending')
            <div class="modal fade" id="modalModifyPetition" tabindex="-1" role="dialog"
                aria-labelledby="modalModifyPetitionTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalModifyPetitionTitle">Modificar petición</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($errors->any())
                                {!! implode('', $errors->all('<span class="invalid-feedback" role="alert" style="display:block !important"> <strong>:message</strong></span><br>')) !!}
                            @endif
                            <form action="{{ route('petition.admin.update', $petition->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form mb-3">
                                    <label class="form-label h4" for="shop_name">Nombre de la Tienda:</label><input
                                        class="form-control" minlength="3" placeholder="{{ $petition->shop_name }}" id="shop_name"
                                        name="shop_name" type="text" />
                                </div>
                                <div class="mb-3">
                                    <label for="shop_description" class="form-label h4">Descripción de la Tienda</label>
                                    <textarea class="form-control" placeholder="Tienda de animales..." id="shop_description"
                                        name="shop_description" minlength="3" rows="3"></textarea>
                                </div>
                                <div class="form mb-3 row">
                                    <div class="col-md-10">
                                        <label class="form-label font-bold h4" for="shop_logo">Logo de la Tienda: <span
                                                class="text-muted fs-6">(250px x 70px)</span></label><input
                                            class="form-control" id="shop_logo" name="shop_logo" type="file" />
                                    </div>
                                    <div class="col-md-2">
                                        <img src="#" id="shop_logo-show" alt="Logo" class="img-thumbnail" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">
                                    Modificar petición
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- modal modificar --}}
    </div>

@endsection
@section('extraFooter')
    <script>
        $(document).ready(function() {
            $("#shop_logo").change(function() {
                previewImage("shop_logo");
            });
        });

    </script>
@endsection
