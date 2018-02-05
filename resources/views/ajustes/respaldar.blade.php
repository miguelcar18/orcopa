@extends('layouts.base')

@section('titulo')
    <title>Respaldar datos - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Respaldar información', 'tituloModulo' => 'Respaldar informacióm', 'iconoModulo' => "glyphicon-show_big_thumbnails"])

<div class="block">
	<div class="block-title"><br></div>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon-info"></i> ¡Atención!</h4> Por este medio se respaldará en un archivo mysql (*.sql) la información registrada hasta el momento<br><br>
		<a href="{{ URL::route('accionRespaldar') }}" class="btn btn-md btn-primary">Respaldar datos</a>
	</div>
</div>
@stop