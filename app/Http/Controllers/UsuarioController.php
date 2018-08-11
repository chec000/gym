<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\User;
use View;
class UsuarioController extends Controller
{
    
    public function  getUsuarios(){
        
        return session()->all();
        return User::find(1);
    }
    
    public function addUsuario(Request $request){
        
    }
    
    public function updateUsuario(Request $request){
        
    }
    
    public function deleteUsuario(Request $request){
        
    }
    
    public function AddMembreciaUsuario(){
        
    }
    
    
    public function PaseListaUsuario(){
        
    }
    
    
    
}
