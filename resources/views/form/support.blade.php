@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- SUPPORT FORM -->
    <div class="container-fluid">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Soporte</h1>
        </div>
        <div class="container-md container-fluid p-5 background-2 text-dark rounded shadow">
            @if ($errors->any())
                {!! implode('', $errors->all('<span class="invalid-feedback" role="alert" style="display:block !important"> <strong>:message</strong></span><br>')) !!}
            @endif
            <form id="formSupport" action="{{ route('support.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="title" class="form-label h4 mb-3">Motivo</label>
                    <select name="title" id="title" class="form-select">
                        <option value="0" selected>Selecciona una opción</option>
                        <option value="Devolución de un pedido">Devolución de un pedido</option>
                        <option value="He encontrado un bug">He encontrado un bug</option>
                        <option value="Reporte">Reporte</option>
                        <option id="other">Otro</option>
                    </select>
                </div>
                <div class="form mb-3">
                    <input type="text" class="form-control" id="titleSpecific" minlength="15" placeholder="Especificar un motivo" />
                </div>
                <div class="form mb-3">
                    <textarea type="text" minlength="3" class="form-control" name="content" id="content"
                        placeholder="Introduce un mensaje"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
@section('extraFooter')
    <script>
        $(document).ready(function() {
            $('#formSupport').on('submit', function(e) {
                if ($('#title').val() == 0) {
                    alert("Cambia el motivo por defecto, gracias");
                    e.preventDefault();
                }
            })
            $('#titleSpecific').hide()
            $('#title').on('change', function() {
                if ($(this).val() == 'Otro') {
                    $('#titleSpecific').show()
                } else {
                    $('#titleSpecific').hide()
                }
            })
            $('#titleSpecific').on('keyup', function() {
                $('#other').val($(this).val())
                console.log($('#other').val());
            })
        });

    </script>
@endsection
