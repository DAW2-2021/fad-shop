@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    @if (Auth::check() && (Auth::user()->id == $shop->user_id || Auth::user()->hasRole('admin')))
        <div class="container-fluid container-md mt-4">
            <div class="alert alert-danger mx-auto" role="alert">
                <h2 class="pt-2">La tienda <span class="fw-bold">{{ $shop->name }} </span>fue bloqueada el
                    <span class="fw-bold">{{ $shop->blocked_at }}</span>,
                    motivo:
                </h2>
                <p class="py-3 fw-bold">{{ $shop->reason }}</p>
                @if (Auth::user()->id == $shop->user_id)
                    <p class="text-muted">¡Contacte con Soporte si cree que ha sido un error!</p>
                @endif
                @if (Auth::user()->hasRole('admin'))
                    <button class="btn btn-outline-success rounded-pill ms-2 mt-2 mt-md-0" data-bs-toggle="modal"
                        data-bs-target="#banModal">Desbloquear la tienda</button>
                    <!-- BAN SHOP Modal -->
                    <form action="{{ route('shop.unban', $shop->slug) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="banModalLabel">Desbloquear la tienda</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group">
                                            <span class="input-group-text">Razón</span>
                                            <textarea class="form-control" aria-label="With textarea" name="reason" required
                                                minlength="20"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Desbloquear la tienda</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    @else
        <div class="container-fluid container-md mt-4">
            <div class="alert alert-danger mx-auto" role="alert">
                <h2 class="pt-2 text-center">¡La tienda <span class="fw-bold">{{ $shop->name }} </span>fue bloqueada!</h2>
            </div>
        </div>

    @endif
@endsection
@section('extraFooter')

@endsection
