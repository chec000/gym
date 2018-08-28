<?php

namespace App\Entities;


use Eloquent;
class UsuarioCliente extends Eloquent
{
    
 protected $table = 'cliente';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_inscripcion', 'id_usuario', 'estado',
    ];
  public function usuario()
    {
         return $this->belongsTo('App\User','id_usuario','id');
    }
  public $timestamps = false;
}
