@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <div class="container">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Categorías</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-head">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>
                                Todas las categorías: </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nº Cat.</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Icono</th>
                        <th class="text-center" scope="col">Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td><i class="{{ $category->icon }}"></i></td>

                            <td class="text-center">
                                <i data-id="{{ $category->id }}" data-icon="{{ $category->icon }}"
                                    data-name="{{ $category->name }}" style="cursor:pointer"
                                    class="fas fa-edit modificarCategoria" data-bs-toggle="modal"
                                    data-bs-target="#CategoryUpdateModal"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row d-flex justify-content-center paginator">{{ $categories->links() }}</div>
    </div>
    <!-- Modal Update Category -->
    <div class="modal fade" id="CategoryUpdateModal" tabindex="-1" role="dialog" aria-labelledby="CategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UserModalLabel">Modificar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form method="post" id="category-form-id" action="#">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form mb-3">
                            <label class="form-label h4" for="category_name_input">Nombre:</label><input
                                class="form-control" minlength="3" id="category_name_input" name="name" type="text" />
                        </div>
                        <div class="form mb-3">
                            <label class="form-label h4" for="category_icon">Icono:</label><input class="form-control"
                                minlength="3" id="category_icon" name="icon" type="text" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extraFooter')
    <script>
        //charge old value in input placeholder
        $(document).ready(function() {
            $(".modificarCategoria").on("click", function() {
                let name = $(this).data("name");
                let icon = $(this).data("icon");
                let id = $(this).data("id");

                $('#category_name_input').attr('placeholder', name);
                $('#category_icon').attr('placeholder', icon);
                let action = "{{ route('categories.admin.update', ['category' => ':id']) }}";
                action = action.replace(':id', id);
                $("#category-form-id").attr('action', action);
            });
        });

        //Autofocus
        var myModal = document.getElementById('CategoryUpdateModal')
        var myInput = document.getElementById('category_name_input')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })

    </script>

@endsection
