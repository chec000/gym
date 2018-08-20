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
    public function saveCliente(){
        $cliente= new Cliente();
        $cliente->nombres="";
        $cliente->apellidos="";
        $cliente->pais="";
        $cliente->estado="";
        $cliente->ciudad="";
        
    }
    
    public function deleteCliente(){
        
    }
    public function updateCliente(){
            return View::make('cliente.updateCliente')->render();          
    }

public function  saveUpdateCliente(Request $request){
        try {
                        DB::beginTransaction();
                        $cliente = Cliente::find($request->id);
                        $cliente->controller = $request->controller_alias;
                        $cliente->role_order = $request->role_order;
                        $cliente->role_section = $request->rol_section;
                        $cliente->active = 1;
                        $cliente->save();
                        
                        DB::commit();
        } catch (Exception $e){
            
        }
         
}

}
