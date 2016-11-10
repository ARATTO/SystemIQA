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
use App\Ciclo;
use Illuminate\Support\Facades\Cache;
use Laracasts\Flash\Flash;
use DB;


class FormulariosController extends Controller
{
   
  public function __construct()
  {
    $this->middleware('auth');
  }


    public function form_cargar_datos_usuarios(){

       return view("formularios.cargar_usuarios");

  }

  public function cargar_datos_usuarios(Request $request){

    $activo = Ciclo::where('activa', '=', 1)->get();
    $acumuladorDeciclo=0;


    foreach($activo as $Ac){
      $acumuladorDeciclo+=1;
    }


    if ($acumuladorDeciclo>0) {
      
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
          } //fin del metro que guarda al estudiante


          $carnetestudiante=Estudiante::where("carnet","=",$fila->car)->first();
          $CA = Ciclo::where('activa', '=', 1)->first();
          //$materiainscrita=MateriaInscrita::where("estudiante_id","=",$carnetestudiante->id)->first();



          $materiainscrita = DB::table('materias_inscritas') 
          ->where('estudiante_id', '=', $carnetestudiante->id)
          ->where('materia_id', "=", $materia->id)
          ->where('ciclo_id', '=', $CA->id)
          ->count();
       
          if($materiainscrita == 0 ){

              $materiaInscrita=new MateriaInscrita;
              $materiaInscrita->cursada=$fila->matricula;
              $materiaInscrita->nota_final=0.0;
              $materiaInscrita->estudiante()->associate($carnetestudiante);
              $materiaInscrita->materia()->associate($materia);

              $activo = Ciclo::where('activa', '=', 1)->get();

              $idCiclo;

              foreach ($activo as $Ac) {
                $idCiclo = $Ac->id;
              }
  
             //dd($idCiclo);
              $materiaInscrita->ciclo_id = $idCiclo;
              $materiaInscrita->activa = 1;

              $materiaInscrita->save();

              

              $evaluacion=Evaluacion::where("materia_id","=",$materia_cache)->paginate(11);

              foreach ($evaluacion as $eva)
              {

                    $nota=new Nota;
                    $nota->nota_evaluacion=0.0;
                    $nota->evaluacion()->associate($eva);
                    $nota->materiaInscrita()->associate($materiaInscrita);

                  

                    $nota->save();
              }
          }


      
 
    });

    }); //cierre de metodo recorrido de archivo


    Flash::success("Estudiantes Guardados");
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
    

  }else{
      Flash::error("Fatal Error");
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
      //return view('mostrarForm');
  }
    }//FIN DEL IF QUE COMPRUEBA SI EXISTE UN CICLO ACTIVO
    else{
      // no hayciclo activo asi que no debe guardar
          flash("NO existe un ciclo activo",'danger');
          $materias = Materia::all();

          $materias->each(function($materias){
                $materias->carreras;
                //$materias->grupos;
            });


          $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

          //return view('formularios.create')
          return view('formularios.create')
          ->with('carrera',$carrera)
          ->with('materias',$materias);

    }




  }//FIN DEL METODO CARGAR_DATOS_USUARIOS    

  

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