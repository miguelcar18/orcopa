<div class="form-group">
	<div class="col-md-4 col-md-offset-4">
		{!! Form::button('<i class="icon-remove"></i> Cancelar', ['class'=> 'btn btn-default', 'id' => 'cancelar', 'type' => 'button', 'onclick' => "document.location.href = '".$rutaCancelar."'"]) !!}
		{!! Form::button('<i class="icon-arrow-right"></i> '.$tituloBoton, ['class'=> 'btn btn-primary', 'id' => $idBoton, 'type' => 'submit', 'data' => $valorData]) !!}
	</div>
</div>