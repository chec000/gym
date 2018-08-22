<?php

namespace App\Entities;


use Eloquent;
class Membresia extends Eloquent
{
    
 protected $table = 'membresias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_id', 'nombre', 'precio','requisitos','duracion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public  function tipo(){
        return $this->hasOne('App\Entities\TipoMembresia','id','tipo_id');
            
           }
}
