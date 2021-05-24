@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <div class="container">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Soportes</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-head">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>
                                Todos los soportes: </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nº Sop.</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Estado</th>
                        <th class="text-center" scope="col">Ver Petición</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supports as $support)
                        <tr>
                            <th scope="row">{{ $support->id }}</th>
                            <td>{{ $support->user->username }}</td>
                            <td>{{ $support->title }}</td>
                            @if (Str::length($support->content) <= 20)
                                <td>{{ $support->content }}</td>
                            @else
                                <td>{{ Str::substr($support->content, 0, 20) . '...' }}</td>
                            @endif
                            <td>{{ $support->status }}</td>
                            <td class="text-center"><a href="{{ route('support.admin.show', $support->id) }}"><i
                                        class="far fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row d-flex justify-content-center paginator">{{ $supports->links() }}</div>
    </div>
@endsection
@section('extraFooter')

@endsection
