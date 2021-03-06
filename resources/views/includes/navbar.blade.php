<!-- NAVBAR -->
<nav class="py-2 py-lg-2 px-xl-4 navbar-light navbar-expand-sm border-bottom " id="navbar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="text-center col-12 col-lg-2">
                <a href="{{ route('index') }}" class="navbar-brand link-dark fs-1 text-dark me-2">
                    FAD SHOP
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse col-lg-10 justify-content-center align-content-center"
                id="navbarSupportedContent">
                <div class="col-sm-8">
                    <div class="position-relative">
                        <input id="search-input"
                            class="form-control me-2 search rounded-pill bg-primary ps-5 py-2 my-2 my-md-0"
                            type="search" placeholder="Buscar" aria-label="Search" />
                        <span class="position-absolute top-50 start-0 translate-middle-y ms-4 text-black-50">
                            <i class="fas fa-search" style="cursor: pointer" id="search-button"></i>
                        </span>
                    </div>
                </div>
                <div class="col-sm-4 ps-lg-5 pt-lg-0 py-3 py-md-0 d-flex justify-content-evenly align-items-center ">
                    @if (Auth::guest())
                        <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#registerModal">Registrarse</a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                            class="btn px-3 fw-bold btn-outline-primary">
                            Identificarse
                        </a>
                    @else
                        @if (Auth::check() && Auth::user()->hasRole('seller'))
                            <div class="nav-item dropdown justify-content-evenly align-items-center">
                                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-store"></i> Tienda
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('shop.index', Auth::user()->shop->slug) }}">
                                            Mostrar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('shop.product.index', Auth::user()->shop->slug) }}">Productos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('shop.sellings', Auth::user()->shop->slug) }}">Historial de productos vendidos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('shop.settings', Auth::user()->shop->slug) }}">Ajustes
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        @endif
                        <div class="nav-item dropdown justify-content-evenly align-items-center">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> {{ Auth::user()->username }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.index') }}">Perfil</a>
                                </li>
                                @if (Auth::check() && Auth::user()->hasRole('admin'))
                                    <li>
                                        <a class="dropdown-item" href="{{ route('shop.admin.index') }}">Administrar
                                            Tiendas</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('petition.admin.index') }}">Administrar
                                            Peticiones</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('support.admin.index') }}">Administrar
                                            Soportes</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('history.index') }}">
                                            Historial de Productos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('categories.admin.index') }}">Administrar
                                            Categor??as</a>
                                    </li>

                                    {{-- <li>
                                        <a class="dropdown-item" href="{{ route('shop.admin.index') }}">Administrar
                                            Tiendas</a>
                                    </li> EXTRA --}}
                                @elseif (Auth::user()->petition)
                                    @if (Auth::user()->petition->status != 'accepted')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('petition.index') }}">Estado
                                                Petici??n
                                                Tienda</a>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <a class="dropdown-item" href="{{ route('petition.create') }}">Crear Petici??n
                                            Tienda</a>
                                    </li>
                                @endif
                                @if (Auth::user()->hasAnyRole(['user', 'seller']))
                                    <li>
                                        <a class="dropdown-item" href="{{ route('support.index') }}">Soporte</a>
                                    </li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                        style="cursor: pointer">Cerrar Sesi??n</a>
                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                    {{-- CART --}}
                    @if (Auth::guest() || (Auth::check() && Auth::user()->hasRole('user')))
                        <a href="{{ route('cart') }}" class="position-relative">
                            <i class="fas fa-shopping-cart fs-4"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge border border-danger rounded-circle bg-danger p-2">
                                <span id="cartSize"></span>
                            </span>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</nav>

@if (!Auth::check())
    <!-- MODALS -->
    <!-- ---- REGISTER -->
    <div class="modal" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Registrarse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<span class="invalid-feedback" role="alert" style="display:block !important"> <strong>:message</strong></span><br>')) !!}
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        @method('POST')
                        <label for="" class="form-label">{{ __('Nombre') }}</label>
                        <input type="text" minlength="3" id="usernameInput" name="username" value="{{ old('name') }}"
                            class="form-control" autofocus />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="" class="form-label mt-2">{{ __('Email') }}</label>
                        <input type="text" minlength="3" name="email" value="{{ old('email') }}"
                            class="form-control" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="row">
                            <div class="col">
                                <label for="" class="form-label mt-2">Contrase??a</label>
                                <input type="password" minlength="3" name="password"
                                    class="form-control @error('password') is-invalid @enderror" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="" class="form-label mt-2">Repetir Contrase??a</label>
                                <input type="password" minlength="3" name="password_confirmation"
                                    class="form-control" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">{{ __('Registrarse') }}</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary align-self-start" data-bs-target="#loginModal"
                        data-bs-toggle="modal" data-bs-dismiss="modal">
                        Iniciar Sesi??n
                    </button>
                    <a href="{{ url('auth/google') }}" type="button" class="btn btn-primary">
                        <span><i class="fab fa-google"></i></span> Google
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ---- LOGIN -->
    <div class="modal fade" id="loginModal" aria-hidden="true" aria-labelledby="loginModalLabel" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar sesi??n</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<span class="invalid-feedback" role="alert" style="display:block !important"> <strong>:message</strong></span><br>')) !!}
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @method('POST')
                        <label for="" class="form-label mt-2">Email</label>
                        <input type="text" minlength="3" id="emailInput" name="email" class="form-control" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="" class="form-label mt-2">Contrase??a</label>
                        <input type="password" minlength="3" name="password" class="form-control" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="submit" class="btn btn-success mt-3">
                            Iniciar sesi??n
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary align-self-start" data-bs-target="#registerModal"
                        data-bs-toggle="modal" data-bs-dismiss="modal">
                        Registrarse
                    </button>
                    <a href="{{ url('auth/google') }}" type="button" class="btn btn-primary">
                        <span><i class="fab fa-google"></i></span> Google
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
@if (Auth::guest())
    <script>
        //AUTOFOCUS
        //----- REGISTER
        var myModal = document.getElementById('registerModal')
        var myInput = document.getElementById('usernameInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })

        //----- LOGIN
        var myModal2 = document.getElementById('loginModal')
        var myInput2 = document.getElementById('emailInput')

        myModal2.addEventListener('shown.bs.modal', function() {
            myInput2.focus()
        })

    </script>
@endif
<script>
    var searchText = document.getElementById("search-input");
    var searchButton = document.getElementById("search-button");

    searchButton.addEventListener("click", function() {
        searchProduct();
    });

    searchText.addEventListener('keyup', function(event) {
        if (event.keyCode === 13) {
            searchProduct();
        }
    });

    function searchProduct() {
        let value = searchText.value.trim();
        if (value != '') {
            let url = "{{ route('search.product', ':value') }}";
            url = url.replace(':value', value);
            window.location.href = url;
        }
    }

</script>
