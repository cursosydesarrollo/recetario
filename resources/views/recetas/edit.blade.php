@extends('layouts.app')


@section('breadcrumb')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="/recetas">Recetas</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="/recetas/{{ $receta->id }}">{{ $receta->nombre }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">edición</li>
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
            {!! Form::model($receta, ['method' => 'PATCH', 
                'route' => ['recetas.update', $receta->id], 'files' => true]) !!}
            @include('recetas._form', ['edicion' => true])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection