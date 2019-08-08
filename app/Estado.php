<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['estado', 'subestado'];

    const ESTADO_PENDIENTE = 5;
    const ESTADO_AYUDA = 4;
    const ESTADO_CANCELADO = 1;
    const ESTADO_APROBADO = 6;
    const ESTADO_PREPARANDO = 7;
    const ESTADO_DESPACHADO = 2;
    const ESTADO_ENTREGADO = 3;
    const ESTADO_RECLAMO = 10;
    const ESTADO_DEVOLUCION = 9;
    const ESTADO_CAMBIO = 8;
    
    
    public $timestamps = false;

    public function orders(){
        return $this->hasMany(Estado::class);
    }
}
