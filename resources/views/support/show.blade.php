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
            <div class="card @if ($support->status == 'pending') bg-warning
                text-dark
            @elseif ($support->status == 'closed') text-white bg-success @endif
                mb-3">
                <div class="col card-header d-flex">
                    <div class="w-50 text-capitalize d-flex
                                                        fw-bold">{{ $support->user->username }}</div>
                    <div class="w-50 text-capitalize d-flex flex-row-reverse
                                                        fw-bold">{{ $support->status }}</div>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Asunto</h5>
                    <p class="card-text">{{ $support->title }}</p>

                    <h5 class="card-title fw-bold">Contenido</h5>
                    <p class="card-text">{{ $support->content }}</p>

                    <h5 class="card-title fw-bold">Fecha de creación</h5>
                    <p class="card-text">{{ $support->created_at }}</p>

                    @if ($support->status != 'pending')
                        <h5 class="card-title fw-bold">Fecha de modificación</h5>
                        <p class="card-text">{{ $support->updated_at }}</p>
                    @endif

                </div>
                <div class="card-footer d-flex jus">
                    @if ($support->status == 'pending')
                        <form class="m-2" action="{{ route('support.admin.close', $support->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button class="btn btn-danger" type="submit">Cerrar petición</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        {{-- modal modificar --}}
        @if ($support->status == 'pending')
            <div class="modal fade" id="modalModifysupport" tabindex="-1" role="dialog"
                aria-labelledby="modalModifysupportTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalModifysupportTitle">Modificar petición</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($errors->any())
                                {!! implode('', $errors->all('<span class="invalid-feedback" role="alert" style="display:block !important"> <strong>:message</strong></span><br>')) !!}
                            @endif
                            <form action="{{ route('support.admin.update', $support->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form mb-3">
                                    <label class="form-label h4" for="shop_name">Nombre de la Tienda:</label><input
                                        class="form-control" placeholder="{{ $support->shop_name }}" id="shop_name"
                                        name="shop_name" type="text" />
                                </div>
                                <div class="mb-3">
                                    <label for="shop_description" class="form-label h4">Descripción de la Tienda</label>
                                    <textarea class="form-control" placeholder="Tienda de animales..." id="shop_description"
                                        name="shop_description" rows="3"></textarea>
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
