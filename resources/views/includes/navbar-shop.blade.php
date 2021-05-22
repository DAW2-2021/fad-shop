<!-- NAV TIENDA -->
<div class="text-center container-fluid container-md my-3 d-flex justify-content-center align-items-center flex-wrap">
    <a href="{{ route('shop.index', $shop->slug) }}"><img class="img me-3"
            src="{{ asset('storage/' . $shop->logo) }}" alt="logo_shop"></a>
    <h2 class="navbar-brand link-dark fs-1 fw-normal text-dark me-2">
        {{ $shop->name }}
    </h2>
    <button class="navbar-toggler justify-content-center align-content-center" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
        <span class="fas fa-search"></span>
    </button>

    @if (Auth::check() && Auth::user()->hasRole('admin'))
        <button class="btn btn-outline-danger rounded-pill ms-2 mt-2 mt-md-0" data-bs-toggle="modal"
            data-bs-target="#banModal">Banear la tienda</button>
        <!-- BAN SHOP Modal -->
        <form action="{{ route('shop.ban', $shop->slug) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="banModalLabel">Banear Tienda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Razón</span>
                                <textarea class="form-control" aria-label="With textarea" name="reason" required
                                    minlength="20"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Banear tienda</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif

    <div class="collapse navbar-collapse justify-content-center align-content-center" id="navbarSupportedContent2">
        <div class="col-sm-6 my-2 mx-auto">
            <div class="position-relative">
                <input class="form-control me-2 search rounded-pill bg-secondary ps-5 py-2 my-2 my-md-0" type="search"
                    placeholder="Buscar" aria-label="Search" />
                <span class="position-absolute top-50 start-0 translate-middle-y ms-4 text-black-50">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- FIN NAV TIENDA -->
