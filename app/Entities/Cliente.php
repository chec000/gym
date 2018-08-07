<?php

namespace App\Entities;


use Eloquent;
class Empleado extends Eloquent
{
    
 protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usu', 'pass', 'apellidos','direccion','fecha_nacimiento','email','fecha_inscripcion','estado','foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
