@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Alerta -->
          <div class="form-group">
              @include('alerts.camposVacios')
              @include('alerts.datoCreado')
              @include('alerts.verificarDato')
          </div>
            <div class="panel panel-default">
                <div class="panel-heading">Crear Producto</div>

                <div class="panel-body">
                    
                    <div class="row" style="padding:15px">

                       <!-- Inicio de Formulario -->
                        {!!Form::open(['route'=>'productos.store', 'method'=>'POST'])!!}
                        
                        <!-- Añadimos el Formulario -->
                        @include('Productos.formulario')

                        <!-- Input Medio  -->
                        <div class="col-lg-6">
                        </div>
                        
                        <div class="col-lg-6">
                          <br>
                          <div class="form-group">
                            {!!Form::submit('Crear Producto',['class'=>'btn btn-lg btn-info btn-block'])!!}
                          </div>
                        </div>
                    
                        {!!Form::close()!!}

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection