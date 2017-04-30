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
                          <th>Nombre Producto</th>
                          <th>Valor</th>
                          <th>Editar</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($productos as $producto)
                        <tr>
                            <td> {{$producto->nombre}} </td>
                            <td> $ {{$producto->valor}} </td>
                            <td> {!!link_to_route('productos.edit', $title = '', $parameters = $producto->id, $attributes = ['class'=>'btn btn-info fa fa-edit'])!!} </td>
                            <td>{!!Form::open(['route'=> ['productos.destroy',$producto->id],'method'=>'DELETE'])!!}
                                    {!!Form::submit('X',['class'=>'btn btn-danger'])!!}
                                {!!Form::close()!!} 
                            </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                <!-- Paginacion -->
                {!! str_replace ('/?', '?', $productos-> render ()) !!}
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <a class="btn btn-default" href="{{ url('/productos/create') }}">
            <i class="fa fa-plus-square  fa-3x" aria-hidden="true"></i></a>
        </div>
    </div>
</div>
@endsection