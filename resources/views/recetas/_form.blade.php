<div class="form-group">
    <label for="nombre">Nombre</label>
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Receta']) !!}
    <small class="form-text text-muted">We'll never share your email with anyone
        else.</small>
</div>

<div class="form-group">
    <label for="descripcion">Descripción</label>
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 5, 'placeholder' => "Descripción"]) !!}
    <small class="form-text text-muted">We'll never share your email with anyone
        else.</small>
</div>


<div class="form-group">
    <label for="descripcion">Imagen</label>
    {!! Form::file('imagen', null, ['class' => 'form-control']) !!}
    <div>{{  isset($receta) ? $receta->imagen_url : '' }}</div>
</div>

<div class="form-group">
    @if (isset($edicion))
    {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}    
    @else
    {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
    @endif

</div>