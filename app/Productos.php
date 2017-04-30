<?php

namespace Bar;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    ///Nombre de la tabla
    protected $table = 'productos';

    //Datos que se Pueden llenar o modificar
    protected $fillable = [
        'nombre', 'valor'];
}
