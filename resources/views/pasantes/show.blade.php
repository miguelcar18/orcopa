@extends('layouts.base')

@section('titulo')
    <title>Información del pasante - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Información del pasante', 'tituloModulo' => 'Pasantes', 'rutaModulo' => URL::route('pasantes.index'), 'tituloSubmodulo' => 'Información del pasante', 'iconoModulo' => "glyphicon-address_book"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::open(['route' => ['pasantes.destroy', $pasante->id], 'method' =>'DELETE', 'id' => 'form-eliminar-pasante', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este registro?\')']) !!}

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <tbody>
        	<tr>
                <th width="25%">Nombre</th>
                <td>{{ $pasante->nombre }}</td>
            </tr>
        	<tr>
                <th>Apellido</th>
                <td>{{ $pasante->apellido }}</td>
            </tr>
            <tr>
                <th>Cédula</th>
                <td>{{ number_format($pasante->cedula, 0, '', '.') }}</td>
            </tr>
            <tr>
                <th>Empresa</th>
                <td>{{ $pasante->nombreEmpresa->nombre }}</td>
            </tr>
            <tr>
                <th>Tutor</th>
                <td>{{ $pasante->nombreTutor->nombre.' '.$pasante->nombreTutor->apellido }}</td>
            </tr>
            <tr>
                <th>Fecha de inicio</th>
                <td>{{ date_format(date_create($pasante->inicio), 'd/m/Y') }}</td>
            </tr>
            <tr>
                <th>Fecha de culminación</th>
                <td>{{ date_format(date_create($pasante->culminacion), 'd/m/Y') }}</td>
            </tr>
            <tr>
                <th>Especialidad</th>
                <td>{{ $pasante->especialidad }}</td>
            </tr>
            @if($pasante->modulo != "")
            <tr>
                <th>Módulo planilla de evaluación</th>
                <td><a href="{{ asset('uploads/pasantes/'.$pasante->modulo) }}" target="_blank">Descargar planilla de evaluación</a></td>
            </tr>
            @endif
            {{--
            <tr>
				<td class="col-md-3 col-sm-4"><b>Acciones</b></td>
				<td>
					<button type="button" id="editar" name="editar" class="btn btn-success" onclick="document.location.href = '{{ URL::route('pasantes.edit', $pasante->id) }}'"> <i class="icon-pencil bigger-120"></i> Editar</button>

					<button type="button" id="eliminar" name="eliminar" class="btn btn-danger tooltip-error borrar" objeto="{{ $pasante->id }}"  onclick="return confirmSubmit(document.forms['form-eliminar-pasante'], '¿Está realmente seguro de eliminar este registro?');"><i class="icon-trash position-right"></i> Eliminar</button>
				</td>
			</tr>
			--}}
        </tbody>
    </table>
    {!! Form::close() !!}
</div>
@stop