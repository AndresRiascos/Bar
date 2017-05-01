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

class CajeroController extends Controller
{
    public function consultarCajaUno(){   
        $mesaUno = DB::table('pedido')
                ->select(DB::raw('pedido.id, entregado, mesa, cancelado, valor, nombre, cantidad, pedido.created_at as fecha'))
                ->where('mesa', 1)->where('entregado', true)->where('cancelado', false)
                ->join('productos', 'productos.id', '=', 'pedido.producto')->paginate(6);
        return view('Cajero/consultarMesaUno' , compact('mesaUno'));
    }

    public function consultarCajaDos(){   
        $mesaDos = DB::table('pedido')
                ->select(DB::raw('pedido.id, entregado, mesa, cancelado, valor, nombre, cantidad, pedido.created_at as fecha'))
                ->where('mesa', 2)->where('entregado', true)->where('cancelado', false)
                ->join('productos', 'productos.id', '=', 'pedido.producto')->paginate(6);
        return view('Cajero/consultarMesaDos' , compact('mesaDos'));
    }

    public function consultarCajaTres(){   
        $mesaTres = DB::table('pedido')
                ->select(DB::raw('pedido.id, entregado, mesa, cancelado, valor, nombre, cantidad, pedido.created_at as fecha'))
                ->where('mesa', 3)->where('entregado', true)->where('cancelado', false)
                ->join('productos', 'productos.id', '=', 'pedido.producto')->paginate(6);
        return view('Cajero/consultarMesaTres' , compact('mesaTres'));
    }

    public function consultarCajaCuatro(){   
        $mesaCuatro = DB::table('pedido')
                ->select(DB::raw('pedido.id, entregado, mesa, cancelado, valor, nombre, cantidad, pedido.created_at as fecha'))
                ->where('mesa', 4)->where('entregado', true)->where('cancelado', false)
                ->join('productos', 'productos.id', '=', 'pedido.producto')->paginate(6);
        return view('Cajero/consultarMesaCuatro' , compact('mesaCuatro'));
    }

    public function consultarCajaCinco(){   
        $mesaCinco = DB::table('pedido')
                ->select(DB::raw('pedido.id, entregado, mesa, cancelado, valor, nombre, cantidad, pedido.created_at as fecha'))
                ->where('mesa', 5)->where('entregado', true)->where('cancelado', false)
                ->join('productos', 'productos.id', '=', 'pedido.producto')->paginate(6);
        return view('Cajero/consultarMesaCinco' , compact('mesaCinco'));
    }

    public function consultarCajaSeis(){   
        $mesaSeis = DB::table('pedido')
                ->select(DB::raw('pedido.id, entregado, mesa, cancelado, valor, nombre, cantidad, pedido.created_at as fecha'))
                ->where('mesa', 6)->where('entregado', true)->where('cancelado', false)
                ->join('productos', 'productos.id', '=', 'pedido.producto')->paginate(6);
        return view('Cajero/consultarMesaSeis' , compact('mesaSeis'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $mesaUno = Pedido::where('mesa', $id)->where('entregado', true)->where('cancelado', false)->get();
        foreach ($mesaUno as $key => $mesa) {
            $pedido = Pedido::find($mesa->id);
            $pedido->cancelado = true;        
            $pedido -> save();
        }

        Session::flash('message-datoCreado', 'Caja Cancelada');
        return Redirect::to('cajauno');
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
