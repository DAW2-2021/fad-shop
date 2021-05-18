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
            <form>
                <div class="form mb-3">
                    <label class="form-label h4" for="shop_name">Nombre de la Tienda:</label><input class="form-control"
                        placeholder="Fad shop" id="shop_name" name="shop_name" type="text" />
                </div>
                <div class="form mb-3 row">
                    <div class="col-md-10">
                        <label class="form-label font-bold h4" for="dni_front">Anverso dni/nif:</label><input
                            class="form-control" placeholder="dni_front" id="dni_front" name="dni_front" type="file" />
                    </div>
                    <div class="col-md-2">
                        <img src="img/AnversoDni3s.jpg" alt="anversoDNI" class="img-thumbnail" />
                    </div>
                </div>
                <div class="form mb-3 row">
                    <div class="col-md-10">
                        <label class="form-label h4" for="dni_back">Reverso dni/nif:</label><input class="form-control"
                            placeholder="dni_back" id="dni_back" name="dni_back" type="file" />
                    </div>
                    <div class="col-md-2">
                        <img src="img/ReversoDni3s.jpg" alt="reversoDNI" class="img-thumbnail" />
                    </div>
                </div>
                <p class="fs-5 text-primary">
                    This form will be reviewed as soon as possible by an
                    administrator.
                </p>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
@section('extraFooter')

@endsection
