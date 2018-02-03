@extends('layouts.base')

@section('titulo')
    <title>Listado de tutores - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Listado de tutores', 'tituloModulo' => 'Tutores', 'iconoModulo' => "glyphicon-briefcase"])

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
				@foreach($tutores as $tutor)
				<tr>
					<td>{{ $tutor->nombre }}</td>
					<td>{{ $tutor->apellido }}</td>
					<td>{{ number_format($tutor->cedula, 0, '', '.') }}</td>
					<td class="text-center">
						<div class="btn-group">
							<a href="{{ URL::route('tutores.show', $tutor->id) }}" data-rel="tooltip" title="Mostrar {{ $tutor->cedula }}" objeto="{{ $tutor->cedula }}" style="text-decoration:none;" data-id="{{ $tutor->id }}"> 
								<span class="btn btn-mini btn-info"> <i class="icon-eye-open bigger-120"></i> </span> 
							</a>
							&nbsp;
							<a href="{{ URL::route('tutores.edit', $tutor->id) }}" class="tooltip-success editar" data-rel="tooltip" title="Editar {{ $tutor->cedula }}" objeto="{{ $tutor->cedula }}" style="text-decoration:none;" data-id="{{ $tutor->id }}"> 
								<span class="btn btn-mini btn-success"> <i class="icon-pencil bigger-120"></i> </span> 
							</a>
							&nbsp;
							<a href="#" data-id="{{ $tutor->id }}" class="tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $tutor->cedula }}" objeto="{{ $tutor->cedula }}"> 
								<span class="btn btn-mini btn-danger"> <i class="icon-remove bigger-120"></i> </span> 
							</a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! Form::open(array('route' => array('tutores.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
        {!! Form::close() !!}
	</div>
</div>
@stop