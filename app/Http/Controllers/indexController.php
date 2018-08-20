<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of indexController
 *
 * @author sergio
 */
use Illuminate\Http\Request;
use App\Entities\Pais;
use App\Entities\Estado;
use View;

class indexController extends Controller{
    //put your code here
    
        
    public function start() {
      
        
        return   View::make('welcome')->render(); 
    }
    
    public function changeLang($lang){
        app()->setLocale($lang);
    }


    public function getEstados(Request $request){
         
        if($request->has('id_pais')){
            $pais= Pais::find($request->id_pais);
            if($pais){
                return  $pais->estados;
            }else{
                return null;
            }
        }else{
            return null;
        }
        
    }
    
    
    public function  getPais(Request $request){
              

                $httpClient = new \Http\Adapter\Guzzle6\Client();      
                $provider = new \Geocoder\Provider\GoogleMaps\GoogleMaps($httpClient, null, 'AIzaSyBBmgIlPaMOTALtAFrpNzOSEpxEJHyoce4');
                $geocoder = new \Geocoder\StatefulGeocoder($provider, 'en');
            $location = $geocoder->reverse($request->lat, $request->lon)->first()->toArray();      
            $country= Pais::where('nombre','=',$location['country'])->first();
            $estado=Estado::where('nombre','=',$location['adminLevels'][1]['name'])->first();
            $data=array('pais' =>$country ,'estado'=>$estado);
            
        return $data;

    }   
}
