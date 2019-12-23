@extends('layouts.app')


@section('breadcrumb')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('roles.index') }}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edición de {{ $role->name }}</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            {{ $errors }}
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
            <div class="form-group">
                <label for="descripcion">Nombre de Rol</label>
                {!! Form::text('name', null, ['class' => 'form-control', 'rows' => 5, 'disabled']) !!}
                <small class="form-text text-muted">Este campo no se puede modificar</small>
            </div>



            <div class="form-group">
                <label for="permissions">Permisos</label>
                {!! Form::select('permissions[]', $perms, null , ['class' => 'form-control', 'multiple']) !!}
            </div>

            {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection