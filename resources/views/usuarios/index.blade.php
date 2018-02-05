@extends('layouts.base')

@section('titulo')
    <title>Listado de usuarios - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Listado de usuarios', 'tituloModulo' => 'Usuarios', 'iconoModulo' => "glyphicon-group"])

<div class="block">
	<div class="block-title"><br></div>
	<div class="table-responsive">
		<table id="example-datatable" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Nombre de usuario</th>
					<th>Correo</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($usuarios as $usuario)
				<tr>
					<td>{{ $usuario->name }}</td>
					<td>{{ $usuario->username }}</td>
					<td>{{ $usuario->email }}</td>
					<td class="text-center">
						<div class="btn-group">
							<a href="{{ URL::route('usuarios.show', $usuario->id) }}" data-rel="tooltip" title="Mostrar {{ $usuario->email }}" objeto="{{ $usuario->email }}" style="text-decoration:none;" data-id="{{ $usuario->id }}"> 
								<span class="btn btn-mini btn-info"> <i class="icon-eye-open bigger-120"></i> </span> 
							</a>
							&nbsp;
							<a href="{{ URL::route('usuarios.edit', $usuario->id) }}" class="tooltip-success editar" data-rel="tooltip" title="Editar {{ $usuario->email }}" objeto="{{ $usuario->email }}" style="text-decoration:none;" data-id="{{ $usuario->id }}"> 
								<span class="btn btn-mini btn-success"> <i class="icon-pencil bigger-120"></i> </span> 
							</a>
							&nbsp;
							<a href="#" data-id="{{ $usuario->id }}" class="tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $usuario->email }}" objeto="{{ $usuario->email }}"> 
								<span class="btn btn-mini btn-danger"> <i class="icon-remove bigger-120"></i> </span> 
							</a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! Form::open(array('route' => array('usuarios.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
        {!! Form::close() !!}
	</div>
</div>
@stop