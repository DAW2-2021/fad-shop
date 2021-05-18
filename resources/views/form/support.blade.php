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
            <form>
                <div class="mb-3">
                    <label for="Select" class="form-label h4 mb-3">Motivo</label>
                    <select id="Select" class="form-select">
                        <option selected>Selecciona una opción</option>
                        <option>Returning an order</option>
                        <option>I have found a bug</option>
                        <option>Report</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form mb-3">
                    <input type="text" class="form-control" id="motivo" placeholder="Specify a reason..." />
                </div>
                <div class="form mb-3">
                    <textarea type="text" class="form-control" id="motivo" placeholder="Mensaje..."></textarea>
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
            $('#motivo').hide()
            $('#Select').on('change', function() {
                if ($(this).val() == 'Other') {
                    $('#motivo').show()
                } else {
                    $('#motivo').hide()
                }
            })
        })

    </script>
@endsection
