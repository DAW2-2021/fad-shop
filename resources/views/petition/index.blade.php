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
            <div class="card @if (Auth::user()->petition->state == 'pending') bg-warning
                text-dark
            @elseif (Auth::user()->petition->state == 'accepted') text-white bg-success
            @elseif (Auth::user()->petition->state == 'rejected') text-white bg-danger @endif

                mb-3">
                <div class="card-header text-capitalize">{{ Auth::user()->petition->state }}</div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Nombre de la tienda</h5>
                    <p class="card-text">{{ Auth::user()->petition->shop_name }}</p>

                    <h5 class="card-title fw-bold">Logo</h5>
                    <p class="card-text"><img src="{{ asset('storage/' . Auth::user()->petition->shop_logo) }}"
                            alt="Logo"></p>

                    <h5 class="card-title fw-bold">Descripción</h5>
                    <p class="card-text">{{ Auth::user()->petition->shop_description }}</p>



                    @if (Auth::user()->petition->motivo)
                        <h5 class="card-title fw-bold">Motivo</h5>
                        <p class="card-text">{{ Auth::user()->petition->motivo }}</p>
                    @endif

                    <h5 class="card-title fw-bold">Fecha de creación</h5>
                    <p class="card-text">{{ Auth::user()->petition->created_at }}</p>

                    @if (Auth::user()->petition->state != 'pending')
                        <h5 class="card-title fw-bold">Fecha de modificación</h5>
                        <p class="card-text">{{ Auth::user()->petition->updated_at }}</p>
                    @endif

                </div>
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
