@extends('auth.login')

@section('titulo')
    <title>Registrar nueva contraseña - Orcopa</title>
@stop

@section('contenido')
<!-- Login Content -->
<!-- Login Form -->
{!! Form::open(['route' => 'password.request', 'method' => 'POST', 'id' => 'changePasswordForm', 'name' => 'changePasswordForm', 'class' => 'form-horizontal m-t-20 form-validate', 'novalidate' => 'novalidate']) !!}
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Correo</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Contraseña</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm" class="col-md-4 control-label">Repetir contraseña</label>
        <div class="col-md-6">
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 text-center">
                {!! Form::button('<i class="icon-angle-right"></i> Ingresar', ['class'=> 'btn btn-sm btn-primary', 'id' => 'changePasswordButton', 'type' => 'submit']) !!}
            </div>
        </div>
    </div>
{!! Form::close()!!}
<!-- END Login Form -->
<p class="text-center"><small>Regresar al login</small> <a href="{{ URL::route('login') }}"><small>Haga click aquí</small></a></p>
<!-- END Login Content -->
@stop