<?php

namespace Bar;

use Illuminate\Database\Eloquent\Model;

class Mesas extends Model
{
    ///Nombre de la tabla
    protected $table = 'Mesas';

    //Datos que se Pueden llenar o modificar
    protected $fillable = [
        'nombreMesa'];
}
