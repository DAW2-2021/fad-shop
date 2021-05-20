@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- AJUSTES PROFILE -->
    <div class="container">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">My profile</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-head">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>
                                {{ Auth::User()->username }} </h5>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#profileModal">
                                Editar Perfil
                            </button>
                        </div>
                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="about-tab" data-bs-toggle="tab" href="#about" role="tab"
                                aria-controls="about" aria-selected="true">Mi cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="coupons-tab" data-bs-toggle="tab" href="#coupons" role="tab"
                                aria-controls="coupons" aria-selected="false">Cupones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="history-tab" data-bs-toggle="tab" href="#history" role="tab"
                                aria-controls="history" aria-selected="false">Historial</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content about-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombre</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::User()->username }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::User()->email }}</p>
                            </div>
                        </div>
                        @if (Auth::User()->phone)
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Teléfono</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::User()->phone }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fecha de creación</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::User()->created_at }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Fecha de modificación</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::User()->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="coupons" role="tabpanel" aria-labelledby="coupons-tab">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span>Código: </span>088438
                                        </h5>
                                        <p class="card-text">
                                            <span>Fecha de vencimiento: </span>
                                            25/03/2021 <br />
                                            <span>Nombre de la tienda: </span>
                                            Shopname
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span>Code: </span>088438
                                        </h5>
                                        <p class="card-text">
                                            <span>Date Due: </span>
                                            25/03/2021 <br />
                                            <span>Shop Name: </span>
                                            Shopname
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span>Code: </span>088438
                                        </h5>
                                        <p class="card-text">
                                            <span>Date Due: </span>
                                            25/03/2021 <br />
                                            <span>Shop Name: </span>
                                            Shopname
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span>Code: </span>088438
                                        </h5>
                                        <p class="card-text">
                                            <span>Date Due: </span>
                                            25/03/2021 <br />
                                            <span>Shop Name: </span>
                                            Shopname
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span>Code: </span>088438
                                        </h5>
                                        <p class="card-text">
                                            <span>Date Due: </span>
                                            25/03/2021 <br />
                                            <span>Shop Name: </span>
                                            Shopname
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <span>Code: </span>088438
                                        </h5>
                                        <p class="card-text">
                                            <span>Date Due: </span>
                                            25/03/2021 <br />
                                            <span>Shop Name: </span>
                                            Shopname
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <div class="row row-cols-1 row-cols-md-1 g-4">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <h5 class="card-title col-md-8">
                                                Pedido n.º
                                                406-3654543-0317946
                                            </h5>
                                            <p class="card-text text-right col-md-4 pb-2">
                                                Shopname, Total: 300€
                                            </p>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <img class="img-thumbnail" src="PC-Gaming.webp" alt="" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="card-title">
                                                                Producto
                                                            </h5>
                                                            <p class="card-text">
                                                                <span>Precio:
                                                                </span>
                                                                70€ <br />
                                                                <span>Cantidad:
                                                                </span>
                                                                2
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-warning">
                                                        Comprar de nuevo
                                                    </button>
                                                    <button type="button" class="btn btn-info">
                                                        Añadir opinión
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <img class="img-thumbnail" src="PC-Gaming.webp" alt="" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="card-title">
                                                                Producto
                                                            </h5>
                                                            <p class="card-text">
                                                                <span>Price:
                                                                </span>
                                                                70€ <br />
                                                                <span>Quantity:
                                                                </span>
                                                                2
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-warning">
                                                        Buy again
                                                    </button>
                                                    <button type="button" class="btn btn-info">
                                                        Add Review
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <img class="img-thumbnail" src="PC-Gaming.webp" alt="" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="card-title">
                                                                Producto
                                                            </h5>
                                                            <p class="card-text">
                                                                <span>Price:
                                                                </span>
                                                                70€ <br />
                                                                <span>Quantity:
                                                                </span>
                                                                2
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-warning">
                                                        Buy again
                                                    </button>
                                                    <button type="button" class="btn btn-info">
                                                        Add Review
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <img class="img-thumbnail" src="PC-Gaming.webp" alt="" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="card-title">
                                                                Producto
                                                            </h5>
                                                            <p class="card-text">
                                                                <span>Price:
                                                                </span>
                                                                70€ <br />
                                                                <span>Quantity:
                                                                </span>
                                                                2
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-warning">
                                                        Buy again
                                                    </button>
                                                    <button type="button" class="btn btn-info">
                                                        Add Review
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <img class="img-thumbnail" src="PC-Gaming.webp" alt="" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="card-title">
                                                                Producto
                                                            </h5>
                                                            <p class="card-text">
                                                                <span>Price:
                                                                </span>
                                                                70€ <br />
                                                                <span>Quantity:
                                                                </span>
                                                                2
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-warning">
                                                        Buy again
                                                    </button>
                                                    <button type="button" class="btn btn-info">
                                                        Add Review
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <img class="img-thumbnail" src="PC-Gaming.webp" alt="" />
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="card-title">
                                                                Producto
                                                            </h5>
                                                            <p class="card-text">
                                                                <span>Price:
                                                                </span>
                                                                70€ <br />
                                                                <span>Quantity:
                                                                </span>
                                                                2
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-warning">
                                                        Buy again
                                                    </button>
                                                    <button type="button" class="btn btn-info">
                                                        Add Review
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODALS -->
    <!-- ---- Profile -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">
                        Editar Perfil
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.update', Auth::User()->id) }}" method="POST" class="row g-3 needs-validation"
                    novalidate>
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <div class="col-md-12 my-3">
                            <label for="validationCustomUsername" class="form-label">Nombre</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" name="username"
                                    value="{{ Auth::User()->username }}" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 my-3">
                            <label for="validationCustomEmail" class="form-label">Email</label>
                            <p class="text-muted">Si tienes una cuenta de google asociada, al cambiar el
                                email se
                                desasociará
                                automáticamente.</p>
                            <div class="input-group has-validation">
                                <input type="email" class="form-control" name="email" id="validationCustomEmail"
                                    aria-describedby="inputGroupPrepend" value="{{ Auth::User()->email }}" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a email.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 my-3">
                            <label for="validationCustomPhone" class="form-label">Teléfono</label>
                            <div class="input-group has-validation">
                                <input type="number" class="form-control" name="phone" id="validationCustomPhone"
                                    aria-describedby="inputGroupPrepend" placeholder="611111111"
                                    value="{{ Auth::User()->phone }}" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a phone.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 my-3">
                            <label for="validationCustomPassword" class="form-label">Nueva contraseña</label>
                            <div class="input-group has-validation">
                                <input type="password" class="form-control" name="password" id="validationCustomPassword"
                                    aria-describedby="inputGroupPrepend" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a password.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 my-3">
                            <label for="validationCustomConfirmPassword" class="form-label">Confirmar nueva
                                contraseña</label>
                            <div class="input-group has-validation">
                                <input type="password" class="form-control" id="validationCustomConfirmPassword"
                                    aria-describedby="inputGroupPrepend" name="password_confirmation" />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a new password.
                                </div>
                            </div>
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
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        ;
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener(
                    'submit',
                    function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    },
                    false
                )
            })
        })()

    </script>
@endsection
