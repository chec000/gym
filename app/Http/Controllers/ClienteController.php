<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
   
      public function index(){                        
      return view('cliente/listClientes');

    }
    public function getClientes(){
        
    }
    public function  addClienteGet(){
          return view('cliente/addCliente');

    }
    public function deleteCliente(){
        
    }
    public function updateCliente(){
        
    }
    
}
