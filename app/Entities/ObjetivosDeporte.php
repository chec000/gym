<?php

namespace App\Entities;


use Eloquent;
class ObjetivosDeporte extends Eloquent
{
    
 protected $table = 'objetivos_deporte';
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
