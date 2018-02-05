@extends('layouts.base')

@section('titulo')
    <title>Modificar usuario - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Modificar usuario', 'tituloModulo' => 'Usuarios', 'rutaModulo' => URL::route('usuarios.index'), 'tituloSubmodulo' => 'Modificar usuario', 'iconoModulo' => "glyphicon-group"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'PUT', 'id' => 'usuarioEditForm', 'name' => 'usuarioEditForm', 'class' => 'form-horizontal', 'files' => true]) !!}
		@include('usuarios.form.EditFormType')
		@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('usuarios.index'), 'valorData' => 0, 'idBoton' => 'usuarioEditSubmit'])
	{!! Form::close()!!}
</div>
@stop