@extends('layouts.base')

@section('titulo')
    <title>Registar empresa - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Registrar empresa', 'tituloModulo' => 'Empresas', 'rutaModulo' => URL::route('empresas.index'), 'tituloSubmodulo' => 'Registrar empresa', 'iconoModulo' => "glyphicon-bank"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::open(['route' => 'empresas.store', 'method' => 'post', 'id' => 'empresaForm', 'name' => 'empresaForm', 'class' => 'form-horizontal', 'files' => true]) !!}
		@include('empresas.form.FormType')
		@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('empresas.index'), 'valorData' => 1, 'idBoton' => 'empresaSubmit'])
	{!! Form::close()!!}
</div>
@stop