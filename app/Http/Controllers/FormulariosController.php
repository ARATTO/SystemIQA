<?php namespace App\Http\Controllers;

use App\Estudiante;
use Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Excel;
use App\Carrera;
use App\Grupo;
use App\Materia;
use App\Evaluacion;
use App\Nota;
use App\MateriaInscrita;
use Illuminate\Support\Facades\Cache;

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
		//dd($request);

    $Carrera=$request->carrera;
    $Materia=$request->materia;

    Cache::put('carrera',$Carrera,5);
    Cache::put('materia',$Materia,5);

	   $archivo = $request->file('archivo');
     
     $nombre_original=$archivo->getClientOriginalName();
     
	   $extension=$archivo->getClientOriginalExtension();
       $r1=Storage::disk('archivos')->put($nombre_original, \File::get($archivo) );
       $ruta  =  storage_path('archivos') ."/". $nombre_original;
       if($r1){
       	    $ct=0;
            Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) {
		        $hoja->each(function($fila) {
              $materia_cache=Cache::get('materia');
              $carrera_cache=Cache::get('carrera');
              $materia=Materia::find($materia_cache);
			        $carnetestudiante=Estudiante::where("carnet","=",$fila->car)->first();
              
			        if(count($carnetestudiante)==0){
    			      	$estudiante=new Estudiante;
    			      	$estudiante->carnet= $fila->car;
    			        $estudiante->nombre= $fila->nom;
    			        $estudiante->apellido= $fila->apell;
    			        $estudiante->materias_ganadas= $fila->mateg;
    			        $estudiante->materias_reprobadas= $fila->matr;
    			        $estudiante->CUM= $fila->cum;
    			        $estudiante->anio_ingreso= $fila->anio;
    			        $estudiante->promedio_ciclo= $fila->prom;
                  //guardando estudiante
                  $estudiante->save();
                  $estudiante->carreras()->attach($carrera_cache);
	                }

                  $materiainscrita=MateriaInscrita::where("estudiante_id","=",$carnetestudiante->id)->first();
                  
                  if(count($materiainscrita) == 0){

                      $materiaInscrita=new MateriaInscrita;
                      $materiaInscrita->cursada=$fila->matricula;
                      $materiaInscrita->nota_final=0.0;
                      $materiaInscrita->estudiante()->associate($carnetestudiante);
                      $materiaInscrita->materia()->associate($materia);
                      $materiaInscrita->save();

                      

                      $evaluacion=Evaluacion::where("materia_id","=",$materia_cache)->paginate(11);

                      foreach ($evaluacion as $eva)
                      {

                            $nota=new Nota;
                            $nota->nota_final=0.0;
                            $nota->evaluacion()->associate($eva);
                            $nota->materiaInscrita()->associate($materiaInscrita);

                          

                            $nota->save();
                      }
                  }


	            
		     
		        });

            });
            return view("mensajes.msj_correcto")->with("msj","Estudiantes Cargados Correctamente");
    	
       }
       else
       {
       	    return view("mensajes.msj_rechazado")->with("msj","Error al subir el archivo");
       }

	}

	public function create(){

       $materias = Materia::all();

       $materias->each(function($materias){
            $materias->carreras;
            //$materias->grupos;
        });


       /*$grupo = Grupo::all();

       $grupo->each(function($grupo){
            $grupo->tipo_grupos;
        });*/


	    $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');



	    return view('formularios.create')
	    ->with('carrera',$carrera)
	    ->with('materias',$materias);


    }

    public function show(Request $request){

        $carreraElejida = $request->CarreraElejida;
        //$grupoElejido = $request->GrupoT;


        $evaluacion = Evaluacion::orderBy('id','ASC')->paginate(10);

       $evaluacion->each(function($evaluacion){
            $evaluacion->materia;
            //dd($evaluacion);
        });


        $materiaSeleccionada;

            if($request->CarreraElejida == 1){
                $materiaSeleccionada = $request->materiasQuimica; 
            }else{
                $materiaSeleccionada = $request->materiasAlimentos; 
            }

        //dd($request);
        // dd($materiaSeleccionada);
        return view('formularios.cargar_usuarios')
        ->with('carreraSeleccionada',$carreraElejida)
        ->with('materiaSeleccionada',$materiaSeleccionada); 
        //->with('grupoSeleccionado',$grupoElejido);



    	
    }






}
