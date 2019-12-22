@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12 d-flex">
            <h3>Usuarios</h3>

            @if (Auth::user())
            <a type="button" href="{{ route('usuarios.create') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-plus"></i> Crear Usuarios
            </a>
            @endif

        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <br />
            <table class="table table-bordered" id="laravel_datatable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Updated At</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
</div>


</div>


@endsection