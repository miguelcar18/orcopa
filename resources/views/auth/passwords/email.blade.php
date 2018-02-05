@extends('auth.login')

@section('titulo')
    <title>Restaurar contraseña - Orcopa</title>
@stop

@section('contenido')
@if (session('status'))
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon-ok"></i> Enviado.</h4> {{ session('status') }}</a>
</div>
@endif
<!-- Login Content -->
<!-- Login Form -->
{!! Form::open(['route' => 'password.email', 'method' => 'post', 'id' => 'emailForm', 'name' => 'emailForm', 'class' => 'form-horizontal m-t-20 form-validate', 'novalidate' => 'novalidate']) !!}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'id' => 'email', 'required' => true, 'value' => old('email')]) !!}

            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 text-center">
                {!! Form::button('<i class="icon-angle-right"></i> Ingresar', ['class'=> 'btn btn-sm btn-primary', 'id' => 'loginButton', 'type' => 'submit']) !!}
            </div>
        </div>
    </div>
{!! Form::close()!!}
<!-- END Login Form -->
<p class="text-center"><small>Regresar al login</small> <a href="{{ URL::route('login') }}"><small>Haga click aquí</small></a></p>
<!-- END Login Content -->
@stop