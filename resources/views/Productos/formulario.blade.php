<div class="col-md-8 col-md-offset-2">

	<!-- Campo de nombre-->
	<div class="form-group">
	  	{!!Form::label('nombre','Nombre Producto:')!!}
	  	{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresa el nombre del Producto', 'required'])!!}
	</div>

	<!-- Campo de valor-->
	<div class="form-group">
		{!!Form::label('valor','Valor o Precio:')!!}
		{!!Form::number('valor',null,['class' => 'form-control','min'=>'0', 'step'=>'1', 'placeholder'=>'Ingresa La Medida del Claex', 'required'])!!}
	</div>

</div>