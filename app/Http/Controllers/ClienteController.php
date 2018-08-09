<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
       private function exportFile($data){
        ob_end_clean();
        ob_start();
        Excel::create('Order_report_'.date('Y_m_d-H:i:s'), function ($excel) use ($data) {
            $excel->sheet('Order', function ($sheet) use ($data) {
                $sheet->with($data, null, 'A1', false, false);
            });
        })->download('xlsx');
    }

}
