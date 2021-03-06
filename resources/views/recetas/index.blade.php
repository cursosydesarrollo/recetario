@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Recetas</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12 d-flex">
            <h3>Recetas</h3>

            @can('crear recetas')
            <a href="{{ route('recetas.create') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-plus"></i> Crear Receta
            </a>
            @endcan
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <hr />
            <div class="list-group">
                @foreach ($items as $item)
                {{-- TODO: links --}}
                <a href="{{ route('recetas.show', $item->id) }}"
                    class="list-group-item list-group-item-action flex-column align-items-start"
                    style="margin-bottom:10px">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $item->nombre }}</h5>
                        <small>{{ $item->updated_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-1 text-danger">{{ $item->descripcion }}</p>
                    <small>{{ $item->usuario->name }}</small>
                </a>
                @endforeach
            </div>
            {{ $items->links() }}
        </div>
    </div>

    @endsection