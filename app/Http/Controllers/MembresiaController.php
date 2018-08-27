<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Beneficio;
use App\Entities\TipoMembresia;
use App\Entities\Membresia;
use App\Entities\Deporte;
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
        $deportes= $this->deportes();
           return   View::make('membresia.add',array(
               "beneficios"=>$beneficios,
               "deportes"=>$deportes,
               "tipos"=>$tipo))->render(); 
    }
    
    private  function deportes(){
        $deportes= Deporte::where('activo','=',1)->get();
    return $deportes;
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
         $membresia->activo=1;        
        $membresia->save();        

         if($request->has('deporte')&&$request->has('beneficio')){
            $membresia->deportes()->attach($request->deporte);
          $membresia->beneficios()->attach($request->beneficio);             
         }
          
        return $this->getAdd();                 
        
    }
    
    public function getMembresiaById($id){
        $tipos_existentes= $this->tipos();
        $deportes_existentes= $this->deportes();
        $benficios_existentes= $this->beneficios();
           $membresia= Membresia::find($id);
//           dd($membresia);
          return   View::make('membresia.edit',array(
              "membresia"=>$membresia,
              "tipos"=>$tipos_existentes,
                "beneficios_existestes"=>$benficios_existentes,
              "deportes_existentes"=>$deportes_existentes,
                  ))->render(); 
                  
    }
    
    public  function updateMembrecia(Request $request){
        try {
            $membresia= Membresia::find($request->id);
           
            $membresia->nombre=$request->nombre;
            $membresia->tipo_id=$request->tipo;
            $membresia->nombre=$request->nombre;
            $membresia->precio=$request->precio;
            $membresia->requisitos=$request->requisitos;
            $membresia->duracion=$request->duracion;
            $membresia->deportes()->detach();
             $membresia->beneficios()->detach();
            $membresia->deportes()->attach($request->deportes);
            $membresia->beneficios()->attach($request->beneficio);          
             $membresia->save();       
            
        } catch (Exception $ex) {
            
        }
         return redirect()->route('list_membresia');
    }
    
    
        public function activeInactiveMembresia(Request $request ){

       $membresia= Membresia::find($request->id);
       
      if($membresia!=null){
          if($membresia->activo==1){
                            $membresia->activo=0;
           $membresia->save();
return 0;
          }else{
              $membresia->activo=1;
           $membresia->save();
return 1;

              }
      }
       
        }
    
    
                                   
}
