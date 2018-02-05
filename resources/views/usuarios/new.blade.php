@extends('layouts.base')

@section('titulo')
    <title>Registar usuario - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Registrar usuario', 'tituloModulo' => 'Usuarios', 'rutaModulo' => URL::route('usuarios.index'), 'tituloSubmodulo' => 'Registrar usuario', 'iconoModulo' => "glyphicon-group"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::open(['route' => 'usuarios.store', 'method' => 'post', 'id' => 'usuarioForm', 'name' => 'usuarioForm', 'class' => 'form-horizontal', 'files' => true]) !!}
		@include('usuarios.form.FormType')
		@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('usuarios.index'), 'valorData' => 1, 'idBoton' => 'usuarioSubmit'])
	{!! Form::close()!!}
</div>
@stop