@extends('layouts.base')

@section('titulo')
    <title>Listado de empresas - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Listado de empresas', 'tituloModulo' => 'Empresas', 'iconoModulo' => "glyphicon-bank"])

<div class="block">
	<div class="block-title"><br></div>
	<div class="table-responsive">
		<table id="example-datatable" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Teléfono</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($empresas as $empresa)
				<tr>
					<td>{{ $empresa->nombre }}</td>
					<td>{{ $empresa->correo }}</td>
					<td>{{ $empresa->telefono }}</td>
					<td class="text-center">
						<div class="btn-group">
							<a href="{{ URL::route('empresas.show', $empresa->id) }}" data-rel="tooltip" title="Mostrar {{ $empresa->nombre }}" objeto="{{ $empresa->nombre }}" style="text-decoration:none;" data-id="{{ $empresa->id }}"> 
								<span class="btn btn-mini btn-info"> <i class="icon-eye-open bigger-120"></i> </span> 
							</a>
							&nbsp;
							<a href="{{ URL::route('empresas.edit', $empresa->id) }}" class="tooltip-success editar" data-rel="tooltip" title="Editar {{ $empresa->nombre }}" objeto="{{ $empresa->nombre }}" style="text-decoration:none;" data-id="{{ $empresa->id }}"> 
								<span class="btn btn-mini btn-success"> <i class="icon-pencil bigger-120"></i> </span> 
							</a>
							&nbsp;
							<a href="#" data-id="{{ $empresa->id }}" class="tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $empresa->nombre }}" objeto="{{ $empresa->nombre }}"> 
								<span class="btn btn-mini btn-danger"> <i class="icon-remove bigger-120"></i> </span> 
							</a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! Form::open(array('route' => array('empresas.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
        {!! Form::close() !!}
	</div>
</div>
@stop