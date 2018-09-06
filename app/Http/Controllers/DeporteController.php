<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Deporte;
use App\Entities\ObjetivosDeporte;
use View;

class DeporteController extends Controller {

    public function index() {
        $deportes = Deporte::with('objetivos')->get();
  
        return View::make('deporte.listDeportes', array('deportes' => $deportes))->render();
    }

    public function addDeporte() {
        $objetivos = ObjetivosDeporte::where('activo', '=', 1)->get();
        return View::make('deporte.addDeporte', array('objetivos' => $objetivos))->render();
    }

    public function updateDeporte() {
        return View::make('deporte.updateDeporte')->render();
    }

    public function deleteDeporte(Request $request) {
        $deporte = Deporte::find($request->id);
        if ($deporte != null) {
            if ($deporte->activo == 1) {
                $deporte->activo = 0;
                $deporte->save();
                return 0;
            } else {
                $deporte->activo = 1;
                $deporte->save();
                return 1;
            }
        }
    }

    public function saveDeporte(Request $request) {
        try {
            $deporte = new Deporte();
            $deporte->nombre = $request->name;
            $deporte->descripcion = $request->descripcion;
            $deporte->activo = ($request->has('activo')) ? 1 : 0;
            $deporte->foto = "test";
            $deporte->save();
            $deporte->objetivos()->attach($request->objetivos);
        } catch (Exception $ex) {
            
        }
        return $this->addDeporte();
    }

    public function getDeporte() {
        
    }

}
