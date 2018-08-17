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
        use View;
class indexController extends Controller{
    //put your code here
    
        
    public function start() {
        return   View::make('welcome')->render(); 
    }
}
