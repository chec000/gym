<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;


class Pais extends Model
{
  
     protected $table = 'pais';
    protected $fillable = ['id'];
            
     
           public  function estados(){
        return $this->hasMany('App\Entities\Estado');
            
           }
    

}
