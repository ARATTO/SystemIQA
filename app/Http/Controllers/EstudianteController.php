<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Carrera;

use App\Materia;
use App\Evaluacion;
use Illuminate\Support\Facades\Cache;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\MateriaInscrita;
use App\Ciclo;
use App\Tutor;
use App\GrupoTutoria;

class EstudianteController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(){
    	//dd("buenas soluciones al reves senoiculos");


        //$estudiante = Estudiante::orderBy('id')->paginate(5);
    	//return view('estado.index')->with('estudiantes',$estudiante);           
    }

    public function show(Request $request){

        $carreraElejida = $request->CarreraElejida;

        $materiaSeleccionada;

            if($request->CarreraElejida == 2){
                $materiaSeleccionada = $request->materiasQuimica; 
            }else{
                $materiaSeleccionada = $request->materiasAlimentos; 
            }

        $CA = Ciclo::where('activa', '=', 1)->first();

        if (count($CA)==0) {
            $materias = Materia::all();

            $materias->each(function($materias){
                $materias->carreras;
            });

            $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

            flash("NO existe un ciclo activo",'danger');

            return view('estado.create')
            ->with('carrera',$carrera)
            ->with('materias',$materias);
        }else{
            $materiaInscrita = MateriaInscrita::where("materia_id", "=",$materiaSeleccionada)
            ->where('activa', '=', 1)
            ->where('ciclo_id', '=', $CA->id)
            ->orderBy('nota_final', 'asc')
            ->paginate(1000);


            $materiaInscrita->each(function($materiaInscrita){
                $materiaInscrita->estudiante;
            } );

            $tutores = Tutor::all()->lists('nombre','id');;


            //dd($request);
            // dd($materiaSeleccionada);
            return view('estado.estado_estudiante')
            ->with('estudiantes',$materiaInscrita) 
            ->with('materiaSeleccionada',$materiaSeleccionada)
            ->with('tutores',$tutores); 
            //->with('grupoSeleccionado',$grupoElejido);
        }


    }


    public function create(){

        $materias = Materia::all();

        $materias->each(function($materias){
            $materias->carreras;
        });

        $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

        return view('estado.create')
        ->with('carrera',$carrera)
        ->with('materias',$materias);
    }

    public function create2(){

        $materias = Materia::all();

        $materias->each(function($materias){
            $materias->carreras;
        });

        $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

        return view('estado.create2')
        ->with('carrera',$carrera)
        ->with('materias',$materias);
    }

    public function show2(Request $request){

        $carreraElejida = $request->CarreraElejida;

        $estudiantes = Estudiante::all();



        $estudiantes->each(function($estudiantes){
            $estudiantes->carreras;
        });

        $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');


            $Estudents = DB::table('carrera_estudiante')
            ->join("estudiantes","carrera_estudiante.estudiante_id","=","estudiantes.id")
            ->where("carrera_id","=",$carreraElejida)
            ->get();

        
        //dd($request);
        // dd($materiaSeleccionada);
        return view('estado.estado_global_estudiante')
        ->with('estudiantes',$Estudents);
        //->with('grupoSeleccionado',$grupoElejido);
    }


    public function guardarTutoria(Request $request){
      $input = $request->all();
        $i=0;
        $CA = Ciclo::where('activa', '=', 1)->first();

        $grupoTutoria=new GrupoTutoria;
        $grupoTutoria->fecha_grupo = $request->fecha_grupo;
        $grupoTutoria->hora = $request->hora;
        $grupoTutoria->tutor_id = $request->tutor;
        $grupoTutoria->materia_id = $request->materiaSeleccionada;
        $grupoTutoria->ciclo_id = $CA->id;

        $grupoTutoria->save();


        $GT= GrupoTutoria::all();
        $GTU = $GT->last();

        
        foreach ($input as $tutoria) {
            
            if ($i>4) {
                $estu = Estudiante::where('carnet', '=', $tutoria)->first();
          
                $estu->grupoTutoria_id = $GTU->id;

                $estu->save();

            }
            $i++;
        }
    
      
      dd($GTU);

    
    }


}
