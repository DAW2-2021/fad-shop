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
                                aria-controls="about" aria-selected="true">Tienda</a>
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
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="tab-content about-tab" id="myTabContent">

                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Productos vendidos</label>
                            </div>
                            @foreach ($orders as $order)
                            <div class="col-md-6">
                                <p>{{ $order->name }}</p>
                                <p>{{ $order->email}}</p>
                                <p>{{ $order->quantity}}</p>
                                <p>{{ $order->price}}</p>
                            </div>
                            @endforeach
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
