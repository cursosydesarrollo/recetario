@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="/recetas">Recetas</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{  $receta->nombre }}</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-8">
            <div class="card ">
                <img class="card-img-top" src="{{ $receta->imagen_url }}" alt="{{ $receta->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $receta->nombre }}</h5>
                    <p class="card-text">{{ $receta->descripcion }}</p>
                    {{-- TODO: links --}}
                    
                    <a href="/recetas/{{ $receta->id }}/edit" class="btn btn-warning card-link">Editar</a>
                    <a href="#" class="btn btn-primary">Recetas de usuario {{  $receta->usuario->name }}</a>

                    <form action="/recetas/{{ $receta->id }}" method="POST" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger text-aling-rigth" style="float: right;">Eliminar receta</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection