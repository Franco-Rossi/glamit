<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'maestro';
    
    protected $fillable = ['metodo_envio','metodo_pago','fecha_creacion','fecha_actualizacion','fecha_factura','estado_id','tienda','costo_envio','intereses','total','cliente_nombre','cliente_email','cliente_telefono','cliente_direccion','item_nombre','item_codigo','item_preciounitario','item_cantidad','item_subtotal'];

    public $timestamps = false;

    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
