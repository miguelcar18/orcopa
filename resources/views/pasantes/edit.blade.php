@extends('layouts.base')

@section('titulo')
    <title>Modificar pasante - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Modificar pasante', 'tituloModulo' => 'Pasantes', 'rutaModulo' => URL::route('pasantes.index'), 'tituloSubmodulo' => 'Modificar pasante', 'iconoModulo' => "glyphicon-address_book"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::model($pasante, ['route' => ['pasantes.update', $pasante->id], 'method' => 'PUT', 'id' => 'pasanteForm', 'name' => 'pasanteForm', 'class' => 'form-horizontal', 'files' => true]) !!}
		@include('pasantes.form.FormType')
		@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('pasantes.index'), 'valorData' => 0, 'idBoton' => 'pasanteSubmit'])
	{!! Form::close()!!}
</div>
@stop