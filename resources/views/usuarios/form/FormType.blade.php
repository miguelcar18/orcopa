<div class="form-group">
	<label class="col-md-4 control-label" for="file">Foto</label>
	<div class="col-md-4">
		{!! Form::file('file', $attributes = array('class' => 'form-control', 'id' => 'file')) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="name">Nombre y apellido</label>
	<div class="col-md-4">
		{!! Form::text('name', null, ['placeholder' => 'Nombre y apellido', 'class' => 'form-control', 'id' => 'name', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="email">Correo</label>
	<div class="col-md-4">
		{!! Form::text('email', null, ['placeholder' => 'Correo', 'class' => 'form-control', 'id' => 'email', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="username">Nombre de usuario</label>
	<div class="col-md-4">
		{!! Form::text('username', null, ['placeholder' => 'Nombre de usuario', 'class' => 'form-control', 'id' => 'username', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="username">Contraseña</label>
	<div class="col-md-4">
		{!! Form::password('password', ['placeholder' => 'Contraseña', 'class' => 'form-control', 'id' => 'password', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="username">Contraseña</label>
	<div class="col-md-4">
		{!! Form::password('password_confirmation', ['placeholder' => 'Repita contraseña', 'class' => 'form-control', 'id' => 'password_confirmation', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="rol">Tipo de usuario</label>
	<div class="col-md-4">
		{!! Form::select('rol', ['' => 'Seleccione','1' => 'Administrador', '0' => 'Usuario'], null, ['id' => 'rol', 'class' => 'form-control', 'data-placeholder' => 'Seleccione', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="details">Notas</label>
	<div class="col-md-4">
		{!! Form::textarea('details', null, ['placeholder' => 'Notas o detalles', 'class' => 'form-control', 'id' => 'details', 'rows' => 3]) !!}
	</div>
</div>
