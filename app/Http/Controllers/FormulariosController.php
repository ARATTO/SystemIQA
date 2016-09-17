<?php namespace App\Http\Controllers;

use App\User;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Excel;

class FormulariosController extends Controller
{
	/*public function __construct()
	{
		$this->middleware('auth');
	}*/


    public function form_cargar_datos_usuarios(){

       return view("formularios.cargar_usuarios");

	}

	public function cargar_datos_usuarios(Request $request)
	{
       $archivo = $request->file('archivo');
       $nombre_original=$archivo->getClientOriginalName();
	   $extension=$archivo->getClientOriginalExtension();
       $r1=Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );
       $ruta  =  storage_path('archivos') ."/". $nombre_original;
       
       if($r1){
       	    $ct=0;
            Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) {
		        
		        $hoja->each(function($fila) {
			        $usersemails=User::where("email","=",$fila->email)->first();
			        if(count( $usersemails)==0){
			        	$userscarnet=User::where("carnet","=",$fila->carnet)->first();
			        	if(count( $userscarnet)==0){
				      	$usuario=new User;
				      	$usuario->carnet= $fila->carnet;
				        $usuario->nombre= $fila->nombre;
				        $usuario->apellido= $fila->apellido;
				        $usuario->password= bcrypt($fila->password);
				        $usuario->email= $fila->email;
				        $usuario->telefono= $fila->telefono; //este campo llamado telefono se debe agregar en la base de datos c
				        $usuario->rol_id= $fila->rol_id;
		                
		                $usuario->save();
	                }
	            }
		     
		        });

            });

            return view("mensajes.msj_correcto")->with("msj"," Usuarios Cargados Correctamente");
    	
       }
       else
       {
       	    return view("mensajes.msj_rechazado")->with("msj","Error al subir el archivo");
       }

	}
}
