@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Tiendas</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-head">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>
                                Todas las tiendas: </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nº Shop.</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Estado</th>
                        <th class="text-center" scope="col">Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shops as $shop)
                        <tr>
                            <th scope="row">{{ $shop->id }}</th>
                            <td>{{ $shop->user->username }}</td>
                            <td>{{ $shop->name }}</td>
                            @if (Str::length($shop->description) <= 20)
                                <td>{{ $shop->description }}</td>
                            @else
                                <td>{{ Str::substr($shop->description, 0, 20) . '...' }}</td>
                            @endif
                            <td> <img src="{{ asset('storage/' . $shop->logo) }}"
                                    alt="Logo de la tienda {{ $shop->name }}" class="w-25" /></td>
                            @if ($shop->blocked_at == null)
                                <td>Activada</td>
                            @else
                                <td>Desactivada</td>
                            @endif


                            <td class="text-center"><a href="{{ route('shop.index', $shop->slug) }}"><i
                                        class="far fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row d-flex justify-content-center paginator">{{ $shops->links() }}</div>
    </div>
@endsection
@section('extraFooter')

@endsection
