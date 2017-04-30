<?php

namespace Bar;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /////Nombre de la tabla
    protected $table = 'pedido';

    //Datos que se Pueden llenar o modificar
    protected $fillable = [
        'mesa', 'producto', 'cantidad', 'entregado', 'cancelado'];
}
