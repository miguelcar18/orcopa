@extends('layouts.base')

@section('titulo')
    <title>Información del usuario - Orcopa</title>
@stop

@section('contenido')
@include('layouts.breadcrumb', ['titulo' => 'Información del usuario', 'tituloModulo' => 'Usuarios', 'rutaModulo' => URL::route('usuarios.index'), 'tituloSubmodulo' => 'Información del usuario', 'iconoModulo' => "glyphicon-group"])

<div class="block">
	<div class="block-title"><br></div>
	{!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' =>'DELETE', 'id' => 'form-eliminar-usuario', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este registro?\')']) !!}

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <th width="25%">Foto de perfil</th>
                <td>
                    @if($usuario->path != "")
                    <img name="fotoActual" id="fotoActual" src="{{ asset('uploads/usuarios/'.$usuario->path) }}" class="img-responsive" alt="" height="150px" width="auto" style="height: 150px">
                    @else
                    <img name="fotoActual" id="fotoActual" src="{{ asset('uploads/usuarios/unfile.png') }}" class="img-responsive" alt="" height="150px" width="auto" style="height: 150px">
                    @endif
                </td>
            </tr>
        	<tr>
                <th>Nombre de usuario</th>
                <td>{{ $usuario->username }}</td>
            </tr>
        	<tr>
                <th>Nombre y apellido</th>
                <td>{{ $usuario->name }}</td>
            </tr>
            <tr>
                <th>Correo</th>
                <td>{{ $usuario->email }}</td>
            </tr>
            <tr>
                <th>Tipo de usuario</th>
                <td>
                    @if($usuario->rol == 1)
                    Administrador
                    @elseif($usuario->rol == 0)
                    Usuario
                    @endif
                </td>
            </tr>
            <tr>
                <th>Notas</th>
                <td>{{ $usuario->details }}</td>
            </tr>
            {{--
            <tr>
				<td class="col-md-3 col-sm-4"><b>Acciones</b></td>
				<td>
					<button type="button" id="editar" name="editar" class="btn btn-success" onclick="document.location.href = '{{ URL::route('usuarios.edit', $usuario->id) }}'"> <i class="icon-pencil bigger-120"></i> Editar</button>

					<button type="button" id="eliminar" name="eliminar" class="btn btn-danger tooltip-error borrar" objeto="{{ $usuario->id }}"  onclick="return confirmSubmit(document.forms['form-eliminar-usuario'], '¿Está realmente seguro de eliminar este registro?');"><i class="icon-trash position-right"></i> Eliminar</button>
				</td>
			</tr>
			--}}
        </tbody>
    </table>
    {!! Form::close() !!}
</div>
@stop