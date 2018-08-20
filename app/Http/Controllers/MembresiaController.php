<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Beneficio;
use App\Entities\TipoMembresia;
use App\Entities\Membresia;

use View;

class MembresiaController extends Controller
{
    
    
    public function getAdd(){
//     return "dhshj";
        $beneficios= Beneficio::where('activo','=',1)->get();
        $tipo= TipoMembresia::where('activo','=',1)->get();
           return   View::make('membresia.add',array("beneficios"=>$beneficios,"tipos"=>$tipo))->render(); 
    }
    
    public function  addMebrecia(Request $request){
        
        
        $membresia= new Membresia();
        $membresia->tipo_id=$request->tipo;
        $membresia->nombre=$request->nombre;
        $membresia->precio=$request->precio;
        $membresia->requisitos=$request->requisitos;
        $membresia->duracion=$request->duracion;
        
        $membresia->save();        
        return $this->getAdd();                 
        
    }
    
    public  function updateMembrecia(){
        
    }
    
    
    
    
    
    
    
    
    
}
