@extends('layouts.base')

@section('titulo')
    <title>Cambiar contraseña - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Cambiar contraseña', 'tituloModulo' => 'Usuarios', 'rutaModulo' => URL::route('usuarios.index'), 'tituloSubmodulo' => 'Cambiar contraseña', 'iconoModulo' => "glyphicon-group"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::open(['route' => 'postChangePassword', 'method' => 'post', 'id' => 'passwordForm', 'name' => 'passwordForm', 'class' => 'form-horizontal', 'files' => true]) !!}
		@include('usuarios.form.ChangeFormType')
		@include('layouts.botonesFormularios', ['tituloBoton' => "Cambiar", 'rutaCancelar' => URL::route('usuarios.index'), 'valorData' => 1, 'idBoton' => 'passwordSubmit'])
	{!! Form::close()!!}
</div>
@stop