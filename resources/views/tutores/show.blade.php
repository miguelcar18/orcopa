@extends('layouts.base')

@section('titulo')
    <title>Información del tutor - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Información del tutor', 'tituloModulo' => 'Tutores', 'rutaModulo' => URL::route('tutores.index'), 'tituloSubmodulo' => 'Información del tutor', 'iconoModulo' => "glyphicon-briefcase"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::open(['route' => ['tutores.destroy', $tutor->id], 'method' =>'DELETE', 'id' => 'form-eliminar-mensualidad', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este registro?\')']) !!}

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <tbody>
        	<tr>
                <th width="25%">Nombre</th>
                <td>{{ $tutor->nombre }}</td>
            </tr>
        	<tr>
                <th>Apellido</th>
                <td>{{ $tutor->apellido }}</td>
            </tr>
            <tr>
                <th>Cédula</th>
                <td>{{ number_format($tutor->cedula, 0, '', '.') }}</td>
            </tr>
            <tr>
                <th>Cargo</th>
                <td>{{ $tutor->cargo }}</td>
            </tr>
            @if($tutor->curriculum != "")
            <tr>
                <th>Curriculum</th>
                <td><a href="{{ asset('uploads/tutores/'.$tutor->curriculum) }}" target="_blank">Descargar currículum</a></td>
            </tr>
            @endif
            {{--
            <tr>
				<td class="col-md-3 col-sm-4"><b>Acciones</b></td>
				<td>
					<button type="button" id="editar" name="editar" class="btn btn-success" onclick="document.location.href = '{{ URL::route('tutores.edit', $tutor->id) }}'"> <i class="icon-pencil bigger-120"></i> Editar</button>

					<button type="button" id="eliminar" name="eliminar" class="btn btn-danger tooltip-error borrar" objeto="{{ $tutor->id }}"  onclick="return confirmSubmit(document.forms['form-eliminar-mensualidad'], '¿Está realmente seguro de eliminar este registro?');"><i class="icon-trash position-right"></i> Eliminar</button>
				</td>
			</tr>
			--}}
        </tbody>
    </table>
    {!! Form::close() !!}
</div>
@stop