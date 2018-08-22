<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Beneficio;
use App\Entities\TipoMembresia;
use App\Entities\Membresia;

use View;

class MembresiaController extends Controller
{
    
    
    public function index(){

       $membresias= Membresia::with('tipo')->get();    
      return   View::make('membresia.list',array("membresias"=>$membresias))->render();   
    }
    public function getAdd(){
        $tipo= $this->tipos();
        $beneficios= $this->beneficios();
           return   View::make('membresia.add',array("beneficios"=>$beneficios,"tipos"=>$tipo))->render(); 
    }
    
    private  function  beneficios()    {
                $beneficios= Beneficio::where('activo','=',1)->get();
            return $beneficios;
    }  
    private function tipos(){
     $tipo= TipoMembresia::where('activo','=',1)->get();
        return $tipo;
    
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
    
    public function getMembresiaById($id){
        $beneficios= $this->beneficios();
            $tipos= $this->tipos();
           $membresia= Membresia::find($id);
          return   View::make('membresia.edit',array("membresia"=>$membresia,
              "beneficios"=>$beneficios,
              "tipos"=>$tipos))->render(); 
                  
    }
    
    public  function updateMembrecia(){
        
    }
    
    
        public function activeInactiveMembresia(Request $request ){

       $membresia= Membresia::find($request->id);
       
      if($membresia!=null){
          if($membresia->activo==1){
                            $membresia->activo=0;

          }else{
              $membresia->activo=1;
          }
      return     $membresia->save();
      }
       
        }
    
    
                                   
}
