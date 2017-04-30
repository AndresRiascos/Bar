<?php

namespace Bar\Http\Controllers;

use Illuminate\Http\Request;
use \Bar\Productos;
use Session;
use Redirect;
use Bar\Http\Requests;
use Bar\Http\Controllers\Controller;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos =  Productos::orderBy('created_at', 'desc')->paginate(6);
        return view('Productos/consultarProductos' , compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Productos/crearProducto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //// Llamamos el Model
            Productos::create(
            [
                // Empaquetamos los Datos  y los envamos al Insert
                'nombre' => $request['nombre'],
                'valor' => $request['valor']
            ]);

            // Enviado Mensaje de Dato Creado
            Session::flash('message-datoCreado', 'Producto Creado');
            $productos =  Productos::paginate(6);
            return view('Productos/consultarProductos' , compact('productos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Productos::find($id);
        return view('Productos/editarProducto' , ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Productos::find($id);
        $producto -> fill( $request -> all() );
        $producto -> save();

        Session::flash('message-datoCreado', 'Producto Actualizado');
        return Redirect::to('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::destroy($id);
        Session::flash('message-datoCreado', 'Producto Eliminado');
        return Redirect::to('productos');
    }
}
