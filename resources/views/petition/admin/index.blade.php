@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
<div class="container">
    <div class="p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Peticiones</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="profile-head">
                <div class="row">
                    <div class="col-md-10">
                        <h5>
                            Todas las peticiones: </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nº Pet.</th>
                <th scope="col">Usuario</th>
                <th scope="col">Nombre de la tienda</th>
                <th scope="col">Descripción</th>
                <th class="text-center" scope="col">Ver Petición</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($petitions as $petition)
              <tr>
                <th scope="row">{{ $petition->id }}</th>
                <td>{{ $petition->user->username }}</td>
                <td>{{ $petition->shop_name }}</td>
                @if (Str::length($petition->shop_description) <= 20)
                <td>{{$petition->shop_description }}</td>
                @else
                <td>{{ Str::substr($petition->shop_description, 0, 20)."..." }}</td>
                @endif
                <td class="text-center"><a href="{{ route('petition.admin.show', $petition->id) }}"><i class="far fa-eye"></i></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
@section('extraFooter')

@endsection