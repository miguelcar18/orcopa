<div class="form-group">
	<label class="col-md-4 control-label" for="password_actual">Contraseña actual:</label>
	<div class="col-md-4">
		{!! Form::password('password_actual', ['placeholder' => 'Contraseña actual', 'class' => 'form-control', 'id' => 'password_actual', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="password">Contraseña nueva:</label>
	<div class="col-md-4">
		{!! Form::password('password', ['placeholder' => 'Contraseña nueva', 'class' => 'form-control', 'id' => 'password', 'required' => true]) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label" for="password_confirmation">Contraseña</label>
	<div class="col-md-4">
		{!! Form::password('password_confirmation', ['placeholder' => 'Repita contraseña', 'class' => 'form-control', 'id' => 'password_confirmation', 'required' => true]) !!}
	</div>
</div>