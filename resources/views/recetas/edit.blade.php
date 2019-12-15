@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            {{ $errors }}
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            {!! Form::model($receta, ['method' => 'PATCH', 'route' => ['recetas.update', $receta->id]]) !!}
            @include('recetas._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection