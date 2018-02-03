@extends('layouts.base')

@section('titulo')
    <title>Modificar tutor - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Modificar tutor', 'tituloModulo' => 'Tutores', 'rutaModulo' => URL::route('tutores.index'), 'tituloSubmodulo' => 'Modificar tutor', 'iconoModulo' => "glyphicon-briefcase"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::model($tutor, ['route' => ['tutores.update', $tutor->id], 'method' => 'PUT', 'id' => 'tutorForm', 'name' => 'tutorForm', 'class' => 'form-horizontal', 'files' => true]) !!}
		@include('tutores.form.FormType')
		@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('tutores.index'), 'valorData' => 0, 'idBoton' => 'tutorSubmit'])
	{!! Form::close()!!}
</div>
@stop