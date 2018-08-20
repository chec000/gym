<?php

namespace App\Entities;


use Eloquent;
class Beneficio extends Eloquent
{
    
 protected $table = 'beneficios';
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
