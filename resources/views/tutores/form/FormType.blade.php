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
	<label class="col-md-4 control-label" for="cargo">Cargo</label>
	<div class="col-md-4">
		{!! Form::text('cargo', null, ['placeholder' => 'Cargo que ejerce', 'class' => 'form-control', 'id' => 'cargo', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="cargo">Curriculum</label>
	<div class="col-md-4">
		{!! Form::file('curriculum', $attributes = array('class' => 'form-control', 'id' => 'curriculum')) !!}
	</div>
</div>