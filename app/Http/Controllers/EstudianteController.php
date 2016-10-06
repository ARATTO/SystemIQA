<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Carrera;

use App\Materia;
use App\Evaluacion;
use Illuminate\Support\Facades\Cache;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\MateriaInscrita;

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

        $materiaInscrita = MateriaInscrita::where("materia_id", "=",$materiaSeleccionada)->paginate(1000);

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







    
}
