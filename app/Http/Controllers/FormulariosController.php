<?php namespace App\Http\Controllers;

use App\Estudiante;
use Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Excel;

class FormulariosController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


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
			        $carnetestudiante=Estudiante::where("carnet","=",$fila->car)->first();
			        if(count( $carnetestudiante)==0){
			        	
				      	$estudiante=new Estudiante;
				      	$estudiante->carnet= $fila->car;
				        $estudiante->nombre= $fila->nom;
				        $estudiante->apellido= $fila->apell;
				        $estudiante->materias_ganadas= $fila->mateg;
				        $estudiante->materias_reprobadas= $fila->matr;
				        $estudiante->CUM= $fila->cum;
				        $estudiante->anio_ingreso= $fila->anio;
				        $estudiante->promedio_ciclo= $fila->prom;
		                
		                $estudiante->save();

		                

		                $estudiante->carreras()->attach($fila->carr);

		                $carrera=new Carrera();
		                //$carrera=Carrera::where("id","=",$fila->carr)->first();

		                dd($carrera);

		                $materia=new Materia();
		                $materia=Materia::where("codigo","=",$fila->codmat)->first();

		                
		                $carrera->materias()->attach($materia->id);

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
