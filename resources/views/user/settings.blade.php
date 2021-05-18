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
                                    Kshiti Ghelani
                                </h5>
                            </div>
                            <div class="col-md-2">
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#profileModal"
                                >
                                    Edit Profile
                                </button>
                            </div>
                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    id="about-tab"
                                    data-bs-toggle="tab"
                                    href="#about"
                                    role="tab"
                                    aria-controls="about"
                                    aria-selected="true"
                                    >About</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="coupons-tab"
                                    data-bs-toggle="tab"
                                    href="#coupons"
                                    role="tab"
                                    aria-controls="coupons"
                                    aria-selected="false"
                                    >Coupons</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="history-tab"
                                    data-bs-toggle="tab"
                                    href="#history"
                                    role="tab"
                                    aria-controls="history"
                                    aria-selected="false"
                                    >History</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content about-tab" id="myTabContent">
                        <div
                            class="tab-pane fade show active"
                            id="about"
                            role="tabpanel"
                            aria-labelledby="about-tab"
                        >
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Kshiti_Ghelani</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>kshitighelani@gmail.com</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>123 456 7890</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Created At</label>
                                </div>
                                <div class="col-md-6">
                                    <p>24/10/2021</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Updated At</label>
                                </div>
                                <div class="col-md-6">
                                    <p>26/10/2021</p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="coupons"
                            role="tabpanel"
                            aria-labelledby="coupons-tab"
                        >
                            <div class="row row-cols-1 row-cols-md-3 g-4">
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
                        <div
                            class="tab-pane fade"
                            id="history"
                            role="tabpanel"
                            aria-labelledby="history-tab"
                        >
                            <div class="row row-cols-1 row-cols-md-1 g-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5 class="card-title col-md-8">
                                                    Order n.º
                                                    406-3654543-0317946
                                                </h5>
                                                <p
                                                    class="card-text text-right col-md-4 pb-2"
                                                >
                                                    Shopname, Total: 300€
                                                </p>
                                            </div>
                                            <div
                                                class="row row-cols-1 row-cols-md-3"
                                            >
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <img
                                                                    class="img-thumbnail"
                                                                    src="PC-Gaming.webp"
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="col">
                                                                <h5
                                                                    class="card-title"
                                                                >
                                                                    Producto
                                                                </h5>
                                                                <p
                                                                    class="card-text"
                                                                >
                                                                    <span
                                                                        >Price:
                                                                    </span>
                                                                    70€ <br />
                                                                    <span
                                                                        >Quantity:
                                                                    </span>
                                                                    2
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <button
                                                            type="button"
                                                            class="btn btn-warning"
                                                        >
                                                            Buy again
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-info"
                                                        >
                                                            Add Review
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <img
                                                                    class="img-thumbnail"
                                                                    src="PC-Gaming.webp"
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="col">
                                                                <h5
                                                                    class="card-title"
                                                                >
                                                                    Producto
                                                                </h5>
                                                                <p
                                                                    class="card-text"
                                                                >
                                                                    <span
                                                                        >Price:
                                                                    </span>
                                                                    70€ <br />
                                                                    <span
                                                                        >Quantity:
                                                                    </span>
                                                                    2
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <button
                                                            type="button"
                                                            class="btn btn-warning"
                                                        >
                                                            Buy again
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-info"
                                                        >
                                                            Add Review
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <img
                                                                    class="img-thumbnail"
                                                                    src="PC-Gaming.webp"
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="col">
                                                                <h5
                                                                    class="card-title"
                                                                >
                                                                    Producto
                                                                </h5>
                                                                <p
                                                                    class="card-text"
                                                                >
                                                                    <span
                                                                        >Price:
                                                                    </span>
                                                                    70€ <br />
                                                                    <span
                                                                        >Quantity:
                                                                    </span>
                                                                    2
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <button
                                                            type="button"
                                                            class="btn btn-warning"
                                                        >
                                                            Buy again
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-info"
                                                        >
                                                            Add Review
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <img
                                                                    class="img-thumbnail"
                                                                    src="PC-Gaming.webp"
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="col">
                                                                <h5
                                                                    class="card-title"
                                                                >
                                                                    Producto
                                                                </h5>
                                                                <p
                                                                    class="card-text"
                                                                >
                                                                    <span
                                                                        >Price:
                                                                    </span>
                                                                    70€ <br />
                                                                    <span
                                                                        >Quantity:
                                                                    </span>
                                                                    2
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <button
                                                            type="button"
                                                            class="btn btn-warning"
                                                        >
                                                            Buy again
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-info"
                                                        >
                                                            Add Review
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <img
                                                                    class="img-thumbnail"
                                                                    src="PC-Gaming.webp"
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="col">
                                                                <h5
                                                                    class="card-title"
                                                                >
                                                                    Producto
                                                                </h5>
                                                                <p
                                                                    class="card-text"
                                                                >
                                                                    <span
                                                                        >Price:
                                                                    </span>
                                                                    70€ <br />
                                                                    <span
                                                                        >Quantity:
                                                                    </span>
                                                                    2
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <button
                                                            type="button"
                                                            class="btn btn-warning"
                                                        >
                                                            Buy again
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-info"
                                                        >
                                                            Add Review
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <img
                                                                    class="img-thumbnail"
                                                                    src="PC-Gaming.webp"
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="col">
                                                                <h5
                                                                    class="card-title"
                                                                >
                                                                    Producto
                                                                </h5>
                                                                <p
                                                                    class="card-text"
                                                                >
                                                                    <span
                                                                        >Price:
                                                                    </span>
                                                                    70€ <br />
                                                                    <span
                                                                        >Quantity:
                                                                    </span>
                                                                    2
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <button
                                                            type="button"
                                                            class="btn btn-warning"
                                                        >
                                                            Buy again
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn btn-info"
                                                        >
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
        <div
            class="modal fade"
            id="profileModal"
            tabindex="-1"
            aria-labelledby="profileModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">
                            Edit Profile
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label
                                    for="validationCustomUsername"
                                    class="form-label"
                                    >Username</label
                                >
                                <div class="input-group has-validation">
                                    <span
                                        class="input-group-text"
                                        id="inputGroupPrepend"
                                        >@</span
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationCustomUsername"
                                        aria-describedby="inputGroupPrepend"
                                        required
                                    />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label
                                    for="validationCustomEmail"
                                    class="form-label"
                                    >Email</label
                                >
                                <div class="input-group has-validation">
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="validationCustomEmail"
                                        aria-describedby="inputGroupPrepend"
                                        required
                                    />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a email.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label
                                    for="validationCustomEmail"
                                    class="form-label"
                                    >New Password</label
                                >
                                <div class="input-group has-validation">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="validationCustomPassword"
                                        aria-describedby="inputGroupPrepend"
                                        required
                                    />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please choose a password.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label
                                    for="validationCustomEmail"
                                    class="form-label"
                                    >Confirm New Password</label
                                >
                                <div class="input-group has-validation">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="validationCustomConfirmPassword"
                                        aria-describedby="inputGroupPrepend"
                                        required
                                    />
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
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
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
    ;(function() {
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
