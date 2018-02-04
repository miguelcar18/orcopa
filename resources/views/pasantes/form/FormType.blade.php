<div class="form-group">
	<label class="col-md-4 control-label" for="nombre">Nombre</label>
	<div class="col-md-4">
		{!! Form::text('nombre', null, ['placeholder' => 'Nombre', 'class' => 'form-control', 'id' => 'nombre', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="apellido">Apellido</label>
	<div class="col-md-4">
		{!! Form::text('apellido', null, ['placeholder' => 'Apelkido', 'class' => 'form-control', 'id' => 'apellido', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="cedula">Cédula</label>
	<div class="col-md-4">
		{!! Form::text('cedula', null, ['placeholder' => 'Número de cédula', 'class' => 'form-control', 'id' => 'cedula', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="ubicacion">Empresa</label>
	<div class="col-md-4">
		{!! Form::select('empresa', $empresas, null, ['id' => 'empresa', 'class' => 'form-control select-chosen', 'data-placeholder' => 'Seleccione', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="tutor">Tutor</label>
	<div class="col-md-4">
		{!! Form::select('tutor', $tutores, null, ['id' => 'tutor', 'class' => 'form-control select-chosen', 'data-placeholder' => 'Seleccione', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="inicio">Fecha de inicio</label>
	<div class="col-md-4">
		@if(isset($pasante->inicio))
		<?php 
			$separarFechaInicio =  explode('-', $pasante->inicio);
			$fechaNormalInicio =  $separarFechaInicio[2].'/'.$separarFechaInicio[1].'/'.$separarFechaInicio[0];
		?>
		{!! Form::text('inicio', $fechaNormalInicio, ['placeholder' => 'dd/mm/aaaa', 'class' => 'form-control input-datepicker', 'id' => 'inicio', 'data-date-format' => 'dd/mm/yy', 'required' => true]) !!}
		@else
		{!! Form::text('inicio', null, ['placeholder' => 'dd/mm/aaaa', 'class' => 'form-control input-datepicker', 'id' => 'inicio', 'data-date-format' => 'dd/mm/yy', 'required' => true]) !!}
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="culminacion">Fecha de culminación</label>
	<div class="col-md-4">
		@if(isset($pasante->culminacion))
		<?php 
			$separarFechaCulminacion =  explode('-', $pasante->culminacion);
			$fechaNormalCulminacion =  $separarFechaCulminacion[2].'/'.$separarFechaCulminacion[1].'/'.$separarFechaCulminacion[0];
		?>
		{!! Form::text('culminacion', $fechaNormalCulminacion, ['placeholder' => 'dd/mm/aaaa', 'class' => 'form-control input-datepicker', 'id' => 'culminacion', 'data-date-format' => 'dd/mm/yy', 'required' => true]) !!}
		@else
		{!! Form::text('culminacion', null, ['placeholder' => 'dd/mm/aaaa', 'class' => 'form-control input-datepicker', 'id' => 'culminacion', 'data-date-format' => 'dd/mm/yy', 'required' => true]) !!}
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="especialidad">Especialidad</label>
	<div class="col-md-4">
		{!! Form::text('especialidad', null, ['placeholder' => 'Especialidad', 'class' => 'form-control', 'id' => 'especialidad', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="modulo">Módulo planilla de evaluación</label>
	<div class="col-md-4">
		{!! Form::file('modulo', $attributes = array('class' => 'form-control', 'id' => 'modulo')) !!}
	</div>
</div>