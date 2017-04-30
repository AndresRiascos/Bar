<div class="col-md-8 col-md-offset-2">

	<!-- Campo de nombre-->
	<div class="form-group">
	  	{!!Form::label('nombre','Mesa:')!!}
	  	{!!Form::select('mesa', $mesas , null, ['class' => 'form-control', 'placeholder'=>'Selecciona la Mesa']) !!}
	</div>

	<div class="form-group">
	  	{!!Form::label('nombre','Producto:')!!}
	  	{!!Form::select('producto', $productos , null, ['class' => 'form-control', 'placeholder'=>'Selecciona el Producto']) !!}
	</div>

	<!-- Campo de valor-->
	<div class="form-group">
		{!!Form::label('valor','Cantidad:')!!}
		{!!Form::number('cantidad',null,['class' => 'form-control','min'=>'0', 'step'=>'1', 'placeholder'=>'Ingresa La Cantidad', 'required'])!!}
	</div>

</div>