<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class ListadoController extends Controller
{
    /*public function __construct()
	{
		$this->middleware('auth');
	}*/


	//presenta el formulario para nuevo usuario
		public function listado_usuarios()
   {      
     
        $usuarios= User::paginate(3);
        return view('listados.listado_usuarios')->with("usuarios", $usuarios);
        
      
	}
}
