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
use DB;

class BartenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = DB::table('pedido')
                ->select(DB::raw('pedido.id, nombreMesa, entregado, nombre, cantidad, pedido.created_at as fecha'))
                ->where('entregado', false)
                ->join('mesas', 'mesas.id', '=', 'pedido.mesa')
                ->join('productos', 'productos.id', '=', 'pedido.producto')
                ->orderBy('fecha', 'desc')
                ->Paginate(6);
        return view('Bartender/menubartender', compact('pedidos'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);
        $pedido->entregado = true;        
        $pedido -> save();

        Session::flash('message-datoCreado', 'Pedido Entregado');
        return Redirect::to('bartender');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);
        $mesas = Mesas::lists('nombreMesa','id');
        $productos = Productos::lists('nombre','id');
        return view('Bartender/editarPedido' , compact('mesas', 'productos'), ['pedido' => $pedido]);
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
        $pedido = Pedido::find($id);
        $pedido -> fill( $request -> all() );
        $pedido -> save();

        Session::flash('message-datoCreado', 'Pedido Actualizado');
        return Redirect::to('bartender');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::destroy($id);
        Session::flash('message-datoCreado', 'Pedido Eliminado');
        return Redirect::to('bartender');
    }
}
