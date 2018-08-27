<?php

namespace App\Entities;


use Eloquent;
class Deporte extends Eloquent
{
    
 protected $table = 'deportes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'nombre', 'descripcion','active','foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
