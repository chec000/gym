<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Cliente;
use App\User;
use View;
class ClienteController extends Controller
{
   
      public function index(){      
          
           return View::make('cliente.listClientes')->render();             
    }
    public function getClientes(){
    
        
    }
    
    private function getUsers(){
               $clientes= User::where('activo','=',1)->get();
               return $clientes;
    }
    public function  addClienteGet(){
        
     return   View::make('cliente.addCliente',array("users"=> $this->getUsers()))->render();          
    }
    
    public function getClienteUsuario(Request $request){
        $users= User::where('nombre','like',$request->nombre)->get();
        
        if(count($users)>0){
            return $users;
        }else{
            return null;
        }
    }
    
    public function saveCliente(){
        
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
