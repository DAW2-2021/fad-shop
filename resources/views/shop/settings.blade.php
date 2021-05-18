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
                            <h5>
                                Shopname
                            </h5>
                            <div class="col-1">
                                <img class="img-thumbnail" src="img/logo.png" alt="" />
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#shopSettingsModal">
                                Edit Shop
                            </button>
                        </div>
                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="about-tab" data-bs-toggle="tab" href="#about" role="tab"
                                aria-controls="about" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="coupons-tab" data-bs-toggle="tab" href="#coupons" role="tab"
                                aria-controls="coupons" aria-selected="false">Coupons</a>
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
                                <label>Shop Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>Shopname</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Description</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Alias voluptas quas
                                    dolor fugit dolorum magnam sit quo,
                                    incidunt iusto fuga nulla ratione
                                    repellat reprehenderit consectetur
                                    necessitatibus vitae ab aspernatur ipsa?
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Active</label>
                            </div>
                            <div class="col-md-6">
                                <p>Yes</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Logo</label>
                            </div>
                            <div class="col-md-6">
                                <div class="col-2">
                                    <img class="img-thumbnail" src="img/logo.png" alt="" />
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
                        Edit Shop
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="row g-3 needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="validationCustomShopName" class="form-label">Shop Name</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" id="validationCustomShopName"
                                    aria-describedby="inputGroupPrepend" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a shop name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustomDescription" class="form-label">Description</label>
                            <div class="input-group has-validation">
                                <textarea class="form-control" id="validationCustomDescription" rows="3"></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a description.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustomLogo" class="form-label">Logo</label>
                            <div class="input-group has-validation">
                                <input type="file" class="form-control" id="validationCustomLogo"
                                    aria-describedby="inputGroupPrepend" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a Logo.
                                </div>
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
                <form class="row g-3 needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="validationCustomCode" class="form-label">Code</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="validationCustomCode"
                                    aria-describedby="inputGroupPrepend" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a code.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustomDateDue" class="form-label">Date due</label>
                            <div class="input-group has-validation">
                                <input type="date" class="form-control" id="validationCustomDateDu"
                                    aria-describedby="inputGroupPrepend" required />
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a date-due.
                                </div>
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
