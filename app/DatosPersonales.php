<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosPersonales extends Model
{
    protected $table = "datos_personales";

    public function domicilio()
    {
        return $this->belongsTo('App\Direccion', 'id_direccion');
    }

}
