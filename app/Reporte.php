<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = "reportes";

    public function propietario()
    {
        return $this->belongsTo('App\DatosPersonales', 'id_datos_personales');
    }

    public function objeto_extraviado()
    {
        return $this->belongsTo('App\ObjetoExtraviado', 'id_objeto_extraviado');
    }

    public function status()
    {
        return $this->belongsTo('App\ReporteStatus', 'id_status');
    }

}
