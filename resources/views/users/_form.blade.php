<div class="form-group">
    <label for="nombre">Nombre Completo</label>
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo']) !!}
    <small class="form-text text-muted">
        else.</small>
</div>

<div class="form-group">
    <label for="nombre">Correo Electronico</label>
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Correo Electronico']) !!}
    <small class="form-text text-muted">We'll never share your email with anyone
        else.</small>
</div>

<div class="form-group">
    <label for="password">Contraseña</label>
    {!! Form::password('password', ['class' => 'form-control']) !!}

</div>

<div class="form-group">
    <label for="password-confirm">Confirmar contraseña</label>
    {!! Form::password('password-confirm', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    @if (isset($edicion))
    {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
    @else
    {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
    @endif
</div>