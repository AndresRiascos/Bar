<?php

namespace Bar\Http\Controllers;

use Illuminate\Http\Request;
use \Bar\Productos;
use \Bar\Mesero;
use \Bar\Mesas;
use \Bar\Pedido;
use Session;
use Redirect;
use Bar\Http\Requests;
use Bar\Http\Controllers\Controller;

class MeseroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = Mesas::lists('nombreMesa','id');
        $productos = Productos::lists('nombre','id');
        return view('Mesero/menuMesero', compact('mesas', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Llamamos el Model
            Pedido::create(
            [
                // Empaquetamos los Datos  y los envamos al Insert
                'mesa' => $request['mesa'],
                'producto' => $request['producto'],
                'cantidad' => $request['cantidad'],
                'entregado' => false,
                'cancelado' => false
            ]);

            // Enviado Mensaje de Dato Creado
            Session::flash('message-datoCreado', 'Pedido Creado');
            $mesas = Mesas::lists('nombreMesa','id');
            $productos = Productos::lists('nombre','id');
            return view('Mesero/menuMesero', compact('mesas', 'productos'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
