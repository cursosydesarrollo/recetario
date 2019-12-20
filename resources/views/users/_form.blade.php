<div class="form-group">
    <label for="nombre">Nombre Completo</label>
    {!! Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? ' is-invalid' : ''),
    'placeholder' => 'Nombre Completo']) !!}
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="nombre">Correo Electronico</label>

    {!! Form::email('email', null, ['class' => 'form-control ' . ($errors->has('email') ? ' is-invalid' : '') ,
    'placeholder' => 'Correo Electronico']) !!}
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="password">Contraseña</label>
    {!! Form::password('password', ['class' => "form-control " . ($errors->has('password') ? ' is-invalid' : '')]) !!}
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="password-confirm">Confirmar contraseña</label>
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="password-confirm">Roles</label>
    {!! Form::select('roles', $roles, null , ['class' => 'form-control', 'placeholder' => 'Asignar Rol']) !!}
</div>


<div class="form-group">
    @if (isset($edicion))
    {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
    @else
    {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
    @endif
</div>