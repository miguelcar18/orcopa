@extends('layouts.base')

@section('titulo')
    <title>Registar pasante - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Registrar pasante', 'tituloModulo' => 'Pasantes', 'rutaModulo' => URL::route('pasantes.index'), 'tituloSubmodulo' => 'Registrar pasante', 'iconoModulo' => "glyphicon-address_book"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::open(['route' => 'pasantes.store', 'method' => 'post', 'id' => 'pasanteForm', 'name' => 'pasanteForm', 'class' => 'form-horizontal', 'files' => true]) !!}
		@include('pasantes.form.FormType')
		@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('pasantes.index'), 'valorData' => 1, 'idBoton' => 'pasanteSubmit'])
	{!! Form::close()!!}
</div>
@stop