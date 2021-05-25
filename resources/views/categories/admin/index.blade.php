@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <div class="container">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Categorías</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-head">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>
                                Todas las categorías: </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nº Cat.</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Icono</th>
                        <th class="text-center" scope="col">Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td><i class="{{ $category->icon }}"></i></td>

                            <td class="text-center"><a href="{{ route('categories.show', $category->slug) }}"><i
                                        class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row d-flex justify-content-center paginator">{{ $categories->links() }}</div>
    </div>
@endsection
@section('extraFooter')

@endsection
