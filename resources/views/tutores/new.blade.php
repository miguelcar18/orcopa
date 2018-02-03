@extends('layouts.base')

@section('titulo')
    <title>Registar tutor - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Registrar tutor', 'tituloModulo' => 'Tutores', 'rutaModulo' => URL::route('tutores.index'), 'tituloSubmodulo' => 'Registrar tutor', 'iconoModulo' => "glyphicon-briefcase"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::open(['route' => 'tutores.store', 'method' => 'post', 'id' => 'tutorForm', 'name' => 'tutorForm', 'class' => 'form-horizontal', 'files' => true]) !!}
		@include('tutores.form.FormType')
		@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('tutores.index'), 'valorData' => 1, 'idBoton' => 'tutorSubmit'])
	{!! Form::close()!!}
</div>
@stop