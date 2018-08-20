<?php

namespace App\Entities;


use Eloquent;
class TipoMembresia extends Eloquent
{
    
 protected $table = 'tipomembresia';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'nombre', 'descripcion','activo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
