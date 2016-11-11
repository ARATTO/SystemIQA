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

            if($request->CarreraElejida == 1){
                $materiaSeleccionada = $request->materiasQuimica; 
            }else{
                $materiaSeleccionada = $request->materiasAlimentos; 
            }

        $CA = Ciclo::where('activa', '=', 1)->first();

        $materiaInscrita = MateriaInscrita::where("materia_id", "=",$materiaSeleccionada)
        ->where('activa', '=', 1)
        ->where('ciclo_id', '=', $CA->id)
        ->orderBy('nota_final', 'asc')
        ->paginate(1000);


        $materiaInscrita->each(function($materiaInscrita){
            $materiaInscrita->estudiante;
        } );




        //dd($request);
        // dd($materiaSeleccionada);
        return view('estado.estado_estudiante')
        ->with('estudiantes',$materiaInscrita); 
        //->with('grupoSeleccionado',$grupoElejido);
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

        

        /*foreach ($estudiantes as $est) {
            dd($est->carreras);
        }
      

            if($request->CarreraElejida == 1){
                
            }else{
                
            }*/

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

}
