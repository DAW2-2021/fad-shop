@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- SUPPORT FORM -->
    <div class="container-fluid">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Añadir producto</h1>
        </div>
        <div class="container-fluid container-md">
            <div class="row">
                <div class="col-12 col-md-6 mb-2 mb-md-5">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<span class="invalid-feedback" role="alert" style="display:block !important"> <strong>:message</strong></span><br>')) !!}
                    @endif
                    <form id="formProduct" method="post" action="{{ route('shop.product.store', $shop->slug) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="product_name" minlength="4" name="name"
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="product_description" rows="5" name="description"
                                minlength="20" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Precio</label>
                            <input type="number" min=".50" step=".01" class="form-control" name="price"
                                value="{{ old('price') }}" id="product_price" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_stock" class="form-label">Stock</label>
                            <input type="number" min="0" class="form-control" id="product_stock"
                                value="{{ old('stock') }}" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Imagen <span class="text-muted fs-6">(650px x
                                    400px)</span></label>
                            <input type="file" class="form-control" id="product_image" name="image"
                                value="{{ old('image') }}" required>
                        </div>
                        <div class="mb-3">
                            <h3 class="form-label mb-2">Categorias</h3>
                            @foreach ($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input categories-checkbox" type="checkbox" name="categories[]"
                                        id="product_category-{{ $category->id }}" value="{{ $category->id }}">
                                    <label class="form-check-label fw-normal"
                                        for="product_category-{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Producto</button>
                    </form>
                </div>
                <div class="col-12 col-md-6 bg-dark border rounded mb-md-0 mb-4 p-0" style="height:25rem">
                    <img class="cover-image" alt="Seleccionar Imagen" id="product_image-show" />
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extraFooter')
    <script>
        $(document).ready(function() {
            $("#product_image").change(function() {
                previewImage("product_image");
            });

            $('#formProduct').on('submit', function(e) {
                let valid = true;

                if (!$(".categories-checkbox:checked").length) {
                    alert("¡Tienes que seleccionar al menos una categoria!");
                    valid = false;
                }

                if (!valid) {
                    e.preventDefault();
                }
            });
        });

    </script>

@endsection
