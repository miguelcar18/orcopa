@extends('layouts.base')

@section('titulo')
    <title>Información de la empresa - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Información de la empresa', 'tituloModulo' => 'Empresas', 'rutaModulo' => URL::route('empresas.index'), 'tituloSubmodulo' => 'Información de la empresa', 'iconoModulo' => "glyphicon-bank"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::open(['route' => ['empresas.destroy', $empresa->id], 'method' =>'DELETE', 'id' => 'form-eliminar-empresa', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este registro?\')']) !!}

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <tbody>
        	<tr>
                <th width="25%">Nombre</th>
                <td>{{ $empresa->nombre }}</td>
            </tr>
        	<tr>
                <th>Dirección</th>
                <td>{{ $empresa->direccion }}</td>
            </tr>
            <tr>
                <th>Correo</th>
                <td>{{ $empresa->correo }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $empresa->telefono }}</td>
            </tr>
            <tr>
                <th>Persona de contacto</th>
                <td>{{ $empresa->contacto }}</td>
            </tr>
            <tr>
                <th>Descripción de la empresa</th>
                <td>{{ $empresa->descripcion }}</td>
            </tr>
            {{--
            <tr>
				<td class="col-md-3 col-sm-4"><b>Acciones</b></td>
				<td>
					<button type="button" id="editar" name="editar" class="btn btn-success" onclick="document.location.href = '{{ URL::route('empresas.edit', $empresa->id) }}'"> <i class="icon-pencil bigger-120"></i> Editar</button>

					<button type="button" id="eliminar" name="eliminar" class="btn btn-danger tooltip-error borrar" objeto="{{ $empresa->id }}"  onclick="return confirmSubmit(document.forms['form-eliminar-empresa'], '¿Está realmente seguro de eliminar este registro?');"><i class="icon-trash position-right"></i> Eliminar</button>
				</td>
			</tr>
			--}}
        </tbody>
    </table>
    {!! Form::close() !!}
    <h4 class="sub-header">Pasantes registrados en esta empresa</h4>
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