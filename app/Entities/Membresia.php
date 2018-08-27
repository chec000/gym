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
        'tipo_id', 'nombre', 'precio','requisitos','duracion','activo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public  function tipo(){
        return $this->hasOne('App\Entities\TipoMembresia','id','tipo_id');
            
           }
           public function  deportes(){
                              return $this->belongsToMany('App\Entities\Deporte', 'membresia_deporte', 'membresia_id', 'deporte_id');

           }

           public function  beneficios(){
                       return $this->belongsToMany('App\Entities\Beneficio','beneficios_membresia','membresia_id','beneficio_id');
           }

           }
