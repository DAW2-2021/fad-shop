@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- SELLER FORM -->
    <div class="container-fluid ">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Petición Tienda</h1>
        </div>
        <div class="container-md w-75 container-fluid p-5 background-2 text-dark rounded shadow">
            @if ($errors->any())
                {!! implode('', $errors->all('<span class="invalid-feedback" role="alert" style="display:block !important"> <strong>:message</strong></span><br>')) !!}
            @endif
            <form action="{{ route('petition.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form mb-3">
                    <label class="form-label h4" for="shop_name">Nombre de la Tienda:</label><input class="form-control"
                        placeholder="Fad shop" minlength="3" id="shop_name" name="shop_name" type="text" />
                </div>
                <div class="mb-3">
                    <label for="shop_description" class="form-label h4">Descripción de la Tienda</label>
                    <textarea class="form-control" placeholder="Tienda de animales..." id="shop_description"
                        name="shop_description" rows="3" minlength="20"></textarea>
                </div>
                <div class="form mb-3 row">
                    <div class="col-md-10">
                        <label class="form-label font-bold h4" for="shop_logo">Logo de la Tienda: <span
                                class="text-muted fs-6">(250px x 70px)</span></label><input class="form-control"
                            id="shop_logo" name="shop_logo" type="file" />
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('img/exampleLogo.png') }}" id="shop_logo-show" alt="Logo de ejemplo"
                            class="img-thumbnail" />
                    </div>
                </div>
                <div class="form mb-3 row">
                    <div class="col-md-10">
                        <label class="form-label font-bold h4" for="dni_front">Anverso dni/nif:</label><input
                            class="form-control" minlength="3" id="dni_front" name="dni_front" type="file" />
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('img/AnversoDni.jpg') }}" id="dni_front-show" alt="anversoDNI"
                            class="img-thumbnail" />
                    </div>
                </div>
                <div class="form mb-3 row">
                    <div class="col-md-10">
                        <label class="form-label h4" for="dni_back">Reverso dni/nif:</label><input class="form-control"
                            id="dni_back" minlength="3" name="dni_back" type="file" />
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('img/ReversoDni.jpg') }}" id="dni_back-show" alt="reversoDNI"
                            class="img-thumbnail" />
                    </div>
                </div>
                <p class="fs-5 text-primary">
                    Este formulario será revisado lo antes posible por un Administrador.
                </p>
                <button type="submit" class="btn btn-primary">
                    Enviar petición
                </button>
            </form>
        </div>
    </div>
@endsection
@section('extraFooter')
    <script>
        $(document).ready(function() {
            $("#dni_back").change(function() {
                previewImage("dni_back");
            });
            $("#dni_front").change(function() {
                previewImage("dni_front");
            });
            $("#shop_logo").change(function() {
                previewImage("shop_logo");
            });
        });

    </script>
@endsection
