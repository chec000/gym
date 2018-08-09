<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
class DeporteController extends Controller
{
    
  
     public function index(){
         return View::make('deporte.listDeportes')->render();             
       
    }
    public function addDeporte(){
         return View::make('deporte.addDeporte')->render(); 
    }
 
    public function updateDeporte(){
                 return View::make('deporte.updateDeporte')->render(); 

    }
    
    //post functions
    
    public function deleteDeporte(){
        
    }
       public function saveDeporte(){
        
    }
    
    public function getDeporte(){
        
    }
    
    
}
