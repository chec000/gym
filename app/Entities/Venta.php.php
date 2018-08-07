<?php

namespace App;


use Eloquent;
class Venta extends Eloquent
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nombres', 'apellidos','direccion','fecha_nacimiento','email','fecha_inscripcion','estado','foto',
    ];
 protected $table = 'users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
