<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use View;
use App\Entities\UsuarioCliente;
use App\Entities\Pais;
use App\Entities\Membresia;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller {

    public function index() {
        $clientes = $this->getClientes();       
        return View::make('cliente.listClientes', array('clientes' => $clientes))->render();
    }

    public function getClientes() {
        $cliente = UsuarioCliente::with('usuario')->get();

        return $cliente;
    }

    public function getClientesAtrasados() {
        $cliente = UsuarioCliente::where([['activo', '=', 1], ['estado_cliente', '=', 'Atrasado']])->get();
        return $cliente;
    }

    private function getUsers() {
        $clientes = User::where('activo', '=', 1)->get();
        return $clientes;
    }

    public function addClienteGet() {
            $paises= Pais::where('activo','=',1)->get();
            $membresias= Membresia::where('activo','=',1)->get();
//            dd($membresias);
             return View::make('cliente.addCliente'
                ,array('paises'=>$paises,'membresias'=>$membresias)
                )->render();
    }

    public function getClienteUsuario(Request $request) {
        $users = User::where('nombre', 'like', $request->nombre)->get();
        if (count($users) > 0) {
            return $users;
        } else {
            return null;
        }
    }

    public function saveCliente(Request $request) {
        $date = new DateTime();
        if ($request->tipo_inscripcion == 1) {
            $userController = new RegisterController();
            $user = $userController->createUser($UserData);
            if ($user != null) {
                $cliente = new UsuarioCliente();
                $cliente->fecha_inscripcion = $date->format();
                $cliente->id_usuario = $user->id;
                $cliente->estado_cliente = "Al dia";
                $cliente->activo = 1;
                $cliente->save();
            } else {
                return false;
            }
        } else {
            $cliente = new UsuarioCliente();
            $cliente->fecha_inscripcion = $date->format();
            $cliente->id_usuario = $request->user_id;
            $cliente->estado_cliente = "Al dia";
            $cliente->activo = 1;
            $cliente->save();
        }
    }

    public function deleteCliente(Request $request) {
        $cliente = UsuarioCliente::find($request->id);
        if ($cliente != null) {
            if ($cliente->activo == 1) {
                $cliente->activo = 0;
                $cliente->save();
                return 0;
            } else {
                $cliente->activo = 1;
                $cliente->save();
                return 1;
            }
        }
    }

    public function updateCliente($id) {
             $cliente = UsuarioCliente::find($id);
            $indexController= new indexController();
            $pais=$indexController->getCountryById($cliente->usuario->pais);
             $estado=$indexController->getStateById($cliente->usuario->estado);
        return View::make('cliente.updateCliente',
                array("cliente"=>$cliente,'pais'=>$pais
                ,"estado"=>$estado
                ))->render();
    }

    public function saveUpdateCliente(Request $request) {
        
       
        try {
            DB::beginTransaction();
           $cliente= UsuarioCliente::find($request->cliente_id);
          $cliente->activo =   ($request->has('activo'))?1:0;
            $cliente->save();
            DB::commit();
          
          return   redirect()->action('ClienteController@index');
        } catch (Exception $e) {
            
        }
    }

}
