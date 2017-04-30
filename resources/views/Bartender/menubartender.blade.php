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
                <div class="panel-heading">Productos</div>
                <div class="panel-body">
                    <table class="table table-striped table-hover table-responsive">
                      <thead>
                        <tr>
                          <th>Orden</th>
                          <th>Mesa</th>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Entregar</th>
                          <th>Editar</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($pedidos as $pedido)
                        <tr>
                            <td> {{$pedido->id}} </td>
                            <td> {{$pedido->nombreMesa}} </td>
                            <td> {{$pedido->nombre}} </td>
                            <td> {{$pedido->cantidad}} </td>
                            <td> {!!link_to_route('bartender.show', $title = '', $parameters = $pedido->id, $attributes = ['class'=>'btn btn-success fa fa-sign-out fa-2x'])!!} </td>
                            <td> {!!link_to_route('bartender.edit', $title = '', $parameters = $pedido->id, $attributes = ['class'=>'btn btn-info fa fa-edit'])!!} </td>
                            <td>{!!Form::open(['route'=> ['bartender.destroy',$pedido->id],'method'=>'DELETE'])!!}
                                    {!!Form::submit('X',['class'=>'btn btn-danger'])!!}
                                {!!Form::close()!!} 
                            </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                <!-- Paginacion -->
                {!! str_replace ('/?', '?', $pedidos-> render ()) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection