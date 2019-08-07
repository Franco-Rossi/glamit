<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['estado', 'subestado'];
    
    public $timestamps = false;

}
