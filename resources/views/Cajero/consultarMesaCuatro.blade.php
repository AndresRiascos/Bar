@extends('layouts.app')

@section('content')

<section id="download">
	<div class="container">
    	<div class="row">
        	<div class="col-md-10 col-md-offset-1">
	      		<!-- Alerta -->
				    <div class="form-group">
				         @include('alerts.datoCreado')
				    </div>
			        <div class="panel panel-default">
				          <div class="panel-heading">
				               Consultar Mesa 4
				          </div>
			          	<div class="panel-body">
			          		<div class="row" style="padding:15px">
				  				<ul class="nav nav-tabs">
								  <li role="presentation"><a href="{!!URL::to('cajauno')!!}">Mesa 1</a></li>
								  <li role="presentation"><a href="{!!URL::to('cajados')!!}">Mesa 2</a></li>
								  <li role="presentation"><a href="{!!URL::to('cajatres')!!}">Mesa 3</a></li>
								  <li role="presentation class="active""><a href="{!!URL::to('cajacuatro')!!}">Mesa 4</a></li>
								  <li role="presentation"><a href="{!!URL::to('cajacinco')!!}">Mesa 5</a></li>
								  <li role="presentation"><a href="{!!URL::to('cajaseis')!!}">Mesa 6</a></li>
								</ul>
				            </div>
				            <div class="row">
				            	<div class="col-md-10 col-md-offset-1">
				            		<table class="table table-striped table-hover table-responsive">
				                      <thead>
				                        <tr>
				                          <th>Producto</th>
				                          <th>Valor</th>
				                          <th>Cantidad</th>
				                          <th>Total</th>
				                        </tr>
				                      </thead>
				                      <tbody>
				                        <?php				         
										  $total = 0;
										?>
				                      @foreach($mesaCuatro as $mesa)
				                      	<?php				         
										  $total = $total + $mesa->cantidad * $mesa->valor;
										?>
				                        <tr>
				                            <td> {{$mesa->nombre}} </td>
				                            <td> {{$mesa->valor}} </td>
				                            <td> {{$mesa->cantidad}} </td>
				                            <td> {{$mesa->cantidad * $mesa->valor}} </td>
				                        </tr>
				                      @endforeach
				                      </tbody>
				                    </table>
					                <!-- Paginacion -->
					                {!! str_replace ('/?', '?', $mesaCuatro-> render ()) !!}

					                <h3 class="text-right">Total a Cancelar = $ {{$total}}</h3>
					                <div class="pull-right">
					                	@if($mesaCuatro[0] != null)
					                		{!!link_to_route('cajero.show', $title = '      Realizar Pago', $parameters = $mesa->mesa, $attributes = ['class'=>'btn btn-success fa fa-money fa-2x'])!!}
					                	@endif
					                </div>
				            	</div>
				            </div>				            
			          	</div>
			        </div>
	   		</div>
	   	</div>
 	</div>
</section>

@endsection