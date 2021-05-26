@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- AJUSTES TIENDA -->
    <div class="container">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Ajustes Tienda</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="shopSettings-head">
                    <div class="row">
                        <div class="col-md-10 d-flex align-items-center">
                            <h5 class="me-5">
                                {{ $shop->name }}
                            </h5>
                            <div class="col-1">
                                <img src="{{ asset('storage/' . $shop->logo) }}"
                                    alt="Logo de la tienda {{ $shop->name }}" />
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#shopSettingsModal">
                                Editar Tienda
                            </button>
                        </div>
                    </div>

                    <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="about-tab" data-bs-toggle="tab" href="#about" role="tab"
                                aria-controls="about" aria-selected="true">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="coupons-tab" data-bs-toggle="tab" href="#coupons" role="tab"
                                aria-controls="coupons" aria-selected="false">Cupones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="add-product-tab" data-bs-toggle="tab" href="#add-product" role="tab"
                                aria-controls="coupons" aria-selected="false">Añadir producto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="tab-content about-tab" id="myTabContent">

                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombre de la Tienda</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $shop->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Description</label>
                            </div>
                            <div class="col-md-6">
                                <p class="text-break">{{ $shop->description }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Logo</label>
                            </div>
                            <div class="col-md-6">
                                <div class="col-2">
                                    <img src="{{ asset('storage/' . $shop->logo) }}"
                                        alt="Logo de la tienda {{ $shop->name }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="coupons" role="tabpanel" aria-labelledby="coupons-tab">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="card-title">
                                                    <span>Code: </span>088438
                                                </h5>
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-end">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editCouponModal">
                                                    Edit
                                                </button>
                                            </div>
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
                    </div>
                    <div class="tab-pane fade" id="add-product" role="tabpanel" aria-labelledby="add-product-tab">
                        <div class="container-fluid container-md">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-2 mb-md-5">
                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<span class="invalid-feedback" role="alert" style="display:block !important"> <strong>:message</strong></span><br>')) !!}
                                    @endif
                                    <form id="formProduct" method="post"
                                        action="{{ route('shop.product.store', $shop->slug) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="mb-3">
                                            <label for="product_name" class="form-label">Nombre del Producto</label>
                                            <input type="text" class="form-control" id="product_name" minlength="4"
                                                name="name" value="{{ old('name') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_description" class="form-label">Descripción</label>
                                            <textarea class="form-control" id="product_description" rows="5"
                                                name="description" minlength="20"
                                                required>{{ old('description') }}</textarea>
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
                                            <label for="product_image" class="form-label">Imagen <span
                                                    class="text-muted fs-6">(650px x 400px)</span></label>
                                            <input type="file" class="form-control" id="product_image" name="image"
                                                value="{{ old('image') }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <h3 class="form-label mb-2">Categorias</h3>
                                            @foreach ($categories as $category)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input categories-checkbox" type="checkbox"
                                                        name="categories[]" id="product_category-{{ $category->id }}"
                                                        value="{{ $category->id }}">
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
                </div>
            </div>
        </div>
    </div>
    <!-- Modals -->
    <!-- ---- Shop Settings -->
    <div class="modal fade" id="shopSettingsModal" tabindex="-1" aria-labelledby="shopSettingsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shopSettingsModalLabel">
                        Editar Tienda
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('shop.update', $shop->slug) }}" method="POST" class="row g-3">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        @if ($errors->any())
                            {!! implode('', $errors->all('<span class="invalid-feedback" role="alert" style="display:block !important"> <strong>:message</strong></span><br>')) !!}
                        @endif
                        <div class="col-md-12">
                            <label for="shop_name" class="form-label">Nombre de la tienda</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" placeholder="{{ $shop->name }}" name="shop_name"
                                    id="shop_name" minlength="3" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="shop_description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="shop_description" name="shop_description" rows="3"
                                minlength="20"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="shop_logo" class="form-label">Logo <span class="text-muted">(250px x
                                    70px)</span></label>
                            <input type="file" class="form-control" id="shop_logo" name="shop_logo" />
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
    <!-- ---- Edit Coupon -->
    <div class="modal fade" id="editCouponModal" tabindex="-1" aria-labelledby="editCouponModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCouponModalLabel">
                        Edit Coupon
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('shop.update', $shop->id) }}" method="POST" class="row g-3">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="validationCustomCode" class="form-label">Code</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="validationCustomCode"
                                    aria-describedby="inputGroupPrepend" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustomDateDue" class="form-label">Date due</label>
                            <div class="input-group has-validation">
                                <input type="date" class="form-control" id="validationCustomDateDu"
                                    aria-describedby="inputGroupPrepend" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extraFooter')
    <script>
        $(document).ready(function() {
            var myModal = document.getElementById('shopSettingsModal')
            var myInput = document.getElementById('shop_name')

            myModal.addEventListener('shown.bs.modal', function() {
                myInput.focus()
            })
        });

    </script>
@endsection
