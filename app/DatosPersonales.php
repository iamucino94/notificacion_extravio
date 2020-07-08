<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosPersonales extends Model
{
    protected $table = "datos_personales";

    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'identificacion', 'telefono', 'email'];

    public function domicilio()
    {
        return $this->belongsTo('App\Direccion', 'id_direccion');
    }

}
