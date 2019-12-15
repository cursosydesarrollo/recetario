@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex">
            <h3>Recetas</h3>
            <a type="button" href="/recetas/create" class="btn btn-primary ml-auto">
                <i class="fas fa-plus"></i> Crear Receta
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <hr />
            <div class="list-group">
                @foreach ($items as $item)
                <a href="/recetas/{{ $item->id }}" class="list-group-item list-group-item-action flex-column align-items-start" style="margin-bottom:10px">
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