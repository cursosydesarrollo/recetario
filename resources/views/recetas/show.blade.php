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

                    @can('editar recetas')
                    <a href="{{ route('recetas.edit', $receta->id) }}" class="btn btn-warning card-link">Editar</a>
                    @endcan

                    <a href="#" class="btn btn-primary">Recetas de usuario {{  $receta->usuario->name }}</a>

                    @can('eliminar recetas')
                    <form action="{{ route('recetas.destroy', $receta->id) }}" method="POST" style="display:inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger text-aling-rigth" style="float: right;">Eliminar
                            receta</a>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection