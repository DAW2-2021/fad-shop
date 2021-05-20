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
            <p>Nombre de la tienda: {{ Auth::user()->petition->shop_name }}</p>
            <p>Logo: <img src="{{ asset('storage/' . Auth::user()->petition->shop_logo) }}" alt="Logo"></p>
            <p>Descripción de la tienda: {{ Auth::user()->petition->shop_description }}</p>
            <p>Estado: {{ Auth::user()->petition->state }}</p>
            @if (Auth::user()->petition->motivo)
                <p>Motivo: {{ Auth::user()->petition->motivo }}</p>
            @endif
            <p>Fecha de creación: {{ Auth::user()->petition->created_at }}</p>
            @if (Auth::user()->petition->state != 'pending')
                <p>Fecha de modificación: {{ Auth::user()->petition->updated_at }}</p>
            @endif
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
