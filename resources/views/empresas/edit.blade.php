@extends('layouts.base')

@section('titulo')
    <title>Modificar empresa - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Modificar empresa', 'tituloModulo' => 'Empresas', 'rutaModulo' => URL::route('empresas.index'), 'tituloSubmodulo' => 'Modificar empresa', 'iconoModulo' => "glyphicon-bank"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::model($empresa, ['route' => ['empresas.update', $empresa->id], 'method' => 'PUT', 'id' => 'empresaForm', 'name' => 'empresaForm', 'class' => 'form-horizontal', 'files' => true]) !!}
		@include('empresas.form.FormType')
		@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('empresas.index'), 'valorData' => 0, 'idBoton' => 'empresaSubmit'])
	{!! Form::close()!!}
</div>
@stop