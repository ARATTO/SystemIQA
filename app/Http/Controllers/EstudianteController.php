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
use App\User;
use App\GrupoAsesoria;

class EstudianteController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

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

        $asesores = User::where("rol_id","=",7)->lists('nombre','id');;
        //dd($request);
        // dd($materiaSeleccionada);
        return view('estado.estado_global_estudiante')
        ->with('estudiantes',$Estudents)
        ->with('asesores',$asesores);
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


    public function guardarAsesoria(Request $request){
        $input = $request->all();
        $i=0;
    

        $grupoAsesoria=new GrupoAsesoria;
        
        $grupoAsesoria->user_id = $request->asesor;

        $grupoAsesoria->save();

        $GA= grupoAsesoria::all();
        $GAU = $GA->last();
        
        foreach ($input as $asesoria) {
            
            if ($i>1) {
                $estu = Estudiante::where('carnet', '=', $asesoria)->first();
            
                if ($estu->materias_ganadas == 46) {
                    
                    $estu->grupoAsesoria_id = $GAU->id;

                    $estu->save();
                }else{
                    flash("No cumple con el 100% de materias ganadas", 'danger');
                }

            }
            $i++;
        }
    
      
      dd($input);

    
    }

    public function index(){
        $grupoTutoria = GrupoTutoria::orderBy('id','ASC')->paginate(10);

        $grupoTutoria->each(function($grupoTutoria){
            $grupoTutoria->materia;
            $grupoTutoria->tutor;
        });


        return view('estado.index')->with('tutorias',$grupoTutoria);
    }

    public function index2(){
        $grupoAsesoria = GrupoAsesoria::orderBy('id','ASC')->paginate(10);

        $grupoAsesoria->each(function($grupoAsesoria){
            $grupoAsesoria->user;
        });

        return view('estado.index2')->with('asesorias',$grupoAsesoria);
    }

    public function verEstTutorias($id){
        $estudiante = Estudiante::where("grupoTutoria_id","=",$id)->get();

        return view('estado.vista')->with('estudiante',$estudiante);

    }

    public function verEstAsesorias($id){
        $estudiante = Estudiante::where("grupoAsesoria_id","=",$id)->get();

        return view('estado.vista2')->with('estudiante',$estudiante);

    }

    public function destroy($id){

        $estudiante = Estudiante::where('grupoTutoria_id','=',$id)->get();

        foreach ($estudiante as $estu) {
            $estu->grupoTutoria_id=null;
            $estu->save();
        }

        $grupoTutoria = GrupoTutoria::where('id', '=', $id)->delete();

        flash('Se ha borrado el grupo de tutoria', 'danger' );

        return redirect()->route('estado.index');

    
    }

    public function destroy2($id){

        $estudiante = Estudiante::where('grupoAsesoria_id','=',$id)->get();

        foreach ($estudiante as $estu) {
            $estu->grupoAsesoria_id=null;
            $estu->save();
        }

        $grupoAsesoria = GrupoAsesoria::where('id', '=', $id)->delete();

        flash('Se ha borrado el grupo de asesoria', 'danger' );

        return redirect()->route('estado.index2');

    
    }






}
