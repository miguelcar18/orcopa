<div class="form-group">
	<label class="col-md-4 control-label" for="nombre">Nombre</label>
	<div class="col-md-4">
		{!! Form::text('nombre', null, ['placeholder' => 'Nombre', 'class' => 'form-control', 'id' => 'nombre', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="direccion">Dirección</label>
	<div class="col-md-4">
		{!! Form::textarea('direccion', null, ['placeholder' => 'Dirección', 'class' => 'form-control', 'id' => 'direccion', 'rows' => 3, 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="correo">Correo</label>
	<div class="col-md-4">
		{!! Form::email('correo', null, ['placeholder' => 'Email o correo', 'class' => 'form-control', 'id' => 'correo', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="telefono">Teléfono</label>
	<div class="col-md-4">
		{!! Form::text('telefono', null, ['placeholder' => 'Teléfono', 'class' => 'form-control', 'id' => 'telefono', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="contacto">Persona de contacto</label>
	<div class="col-md-4">
		{!! Form::text('contacto', null, ['placeholder' => 'Nombre del contacto', 'class' => 'form-control', 'id' => 'contacto', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="descripcion">Descripción de la empresa</label>
	<div class="col-md-4">
		{!! Form::textarea('descripcion', null, ['placeholder' => 'Descripción de la empresa', 'class' => 'form-control', 'id' => 'descripcion', 'rows' => 3, 'required' => true]) !!}
	</div>
</div>