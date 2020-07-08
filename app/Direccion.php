<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = "direcciones";

    protected $fillable = ['calle', 'numero', 'numero_interior', 'codigo_postal', 'municipio', 'estado'];
}
