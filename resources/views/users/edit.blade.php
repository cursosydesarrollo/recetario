@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar usuario</li>
        </ol>
    </div>
</nav>
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex">
            <h3>{{ $usuario->name }}</h3>

            <form class="ml-auto text-aling-rigth" action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                style="display:inline">
                @method('DELETE')
                @csrf

                <a href="#" class="btn text-aling-rigth">Resetear Contraseña</a>
                <button type="submit" class="btn btn-danger text-aling-rigth" style="float: right;">Cancelar Usuario</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            {!! Form::model($usuario, ['method' => 'PATCH', 'route' => ['usuarios.update', $usuario->id]]) !!}
            @include('users._form', array('edicion' => true))
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection