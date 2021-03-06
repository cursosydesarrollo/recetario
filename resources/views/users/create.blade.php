@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Agregar usuario</li>
        </ol>
    </div>
</nav>
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            {!! Form::open(['url' => [route('usuarios.store')], 'method' => 'POST' ,'files'=>'true']) !!}
            @include('users._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection