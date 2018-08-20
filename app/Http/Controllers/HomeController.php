<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
     public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
    
    
        switch ($request->user()->roles[0]->id){
        case 1:
        return view('admin/admin');
            break;       
        case 2;
                      return view('home');
            break;;
        }
        
    }
    
    public function home(){                        
      return view('admin/admin');

    }
        
}
