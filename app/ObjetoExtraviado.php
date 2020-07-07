<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjetoExtraviado extends Model
{
    protected $table = "objetos_extraviados";

    public function tipo()
    {
        return $this->belongsTo('App\TipoObjeto', 'id_tipo_objeto');
    }
}
