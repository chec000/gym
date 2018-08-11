<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Cliente;
use View;
class ClienteController extends Controller
{
   
      public function index(){      
          
           return View::make('cliente.listClientes')->render();             
    }
    public function getClientes(){
        
    }
    
    public function  addClienteGet(){
     return   View::make('cliente.addCliente')->render(); 
         
    }
    public function deleteCliente(){
        
    }
    public function updateCliente(){
            return View::make('cliente.updateCliente')->render();          
    }


}
