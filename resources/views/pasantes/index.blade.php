@extends('layouts.base')

@section('titulo')
    <title>Listado de pasantes - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Listado de pasantes', 'tituloModulo' => 'Pasantes', 'iconoModulo' => "glyphicon-address_book"])

<div class="block">
	<div class="block-title"><br></div>
	<div class="table-responsive">
		<table id="example-datatable" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Cédula</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pasantes as $pasante)
				<tr>
					<td>{{ $pasante->nombre }}</td>
					<td>{{ $pasante->apellido }}</td>
					<td>{{ number_format($pasante->cedula, 0, '', '.') }}</td>
					<td class="text-center">
						<div class="btn-group">
							<a href="{{ URL::route('pasantes.show', $pasante->id) }}" data-rel="tooltip" title="Mostrar {{ $pasante->cedula }}" objeto="{{ $pasante->cedula }}" style="text-decoration:none;" data-id="{{ $pasante->id }}"> 
								<span class="btn btn-mini btn-info"> <i class="icon-eye-open bigger-120"></i> </span> 
							</a>
							&nbsp;
							<a href="{{ URL::route('pasantes.edit', $pasante->id) }}" class="tooltip-success editar" data-rel="tooltip" title="Editar {{ $pasante->cedula }}" objeto="{{ $pasante->cedula }}" style="text-decoration:none;" data-id="{{ $pasante->id }}"> 
								<span class="btn btn-mini btn-success"> <i class="icon-pencil bigger-120"></i> </span> 
							</a>
							&nbsp;
							<a href="#" data-id="{{ $pasante->id }}" class="tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $pasante->cedula }}" objeto="{{ $pasante->cedula }}"> 
								<span class="btn btn-mini btn-danger"> <i class="icon-remove bigger-120"></i> </span> 
							</a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! Form::open(array('route' => array('pasantes.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
        {!! Form::close() !!}
	</div>
</div>
@stop