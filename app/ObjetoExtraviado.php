<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjetoExtraviado extends Model
{
    protected $table = "objetos_extraviados";

    protected $fillable = ['nombre', 'descripcion'];

    public function tipo()
    {
        return $this->belongsTo('App\TipoObjeto', 'id_tipo_objeto');
    }
}
