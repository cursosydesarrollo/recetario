@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Roles</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12 d-flex">
            <h3>Roles</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <br>
            <div class="list-group">
                @foreach ($roles as $rol)
                <a href="#"
                    class="list-group-item list-group-item-action">{{ $rol->name }}</a>
                @endforeach
            </div>
        </div>
        {{ $roles->links() }}
    </div>


    @endsection