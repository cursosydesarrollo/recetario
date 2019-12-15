@extends('layouts.app')

@section('content')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md">
                    {{ $errors }}
                </div>
    </div>
    <div class="row">
        
        <div class="col-md">
            {{-- TODO: links --}}
            {!! Form::open(['url' => '/recetas', 'method' => 'POST' ,'files'=>'true']) !!}

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre de Receta">
                <small class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" rows="5"
                    placeholder="Descripción de Receta"></textarea>
                <small class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>

            
            <div class="form-group">
                <label for="descripcion">Imagen</label>
                {!! Form::file('imagen') !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Upload File', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection