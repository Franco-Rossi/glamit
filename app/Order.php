<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'maestro';

    public $timestamps = false;

    public function estado(){
        return $this->hasOne(Estado::class);
    }
}
