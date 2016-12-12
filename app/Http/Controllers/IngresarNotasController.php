<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Materia;
use App\Carrera;
use App\Evaluacion;
use App\MateriaInscrita;
use App\Nota;
use App\Ciclo;
use App\Grupo;

class IngresarNotasController extends Controller
{

        
     public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function create(){

        $materias = Materia::all();

       $materias->each(function($materias){
            $materias->carreras;
        });

          	
         
        $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

        return view('notasAlumnos.create')
        ->with('carrera',$carrera)
        ->with('materias',$materias);

    }

        public function create2(Request $request){

        //dd($request->all());

        $materiaSeleccionada;

        if($request->CarreraElejida == 1){
            $materiaSeleccionada = $request->materiasQuimica; 
        }else{
            $materiaSeleccionada = $request->materiasAlimentos;
           
        }

        $grupos = Grupo::where('materia_id','=',$materiaSeleccionada)->lists('codigo','id');

       // dd($grupos);

        return view('notasAlumnos.grupo')
        ->with('grupos',$grupos)
        ->with('CarreraElejida',$request->CarreraElejida)
        ->with('materiasAlimentos',$request->materiasAlimentos)
        ->with('materiasQuimica',$request->materiasQuimica);
        
    }



    public function show(Request $request){

       // dd($request->all());

        $carreraElejida = $request->carreraElejida;


        $evaluacion = Evaluacion::all();

       $evaluacion->each(function($evaluacion){
            $evaluacion->materia;
            //dd($evaluacion);
        });

      // $CE = Carrera::where('id', '=', $carreraElejida)->get();


        $materiaSeleccionada;

            if($request->CarreraElejida == 1){
                $materiaSeleccionada = $request->materiasQuimica; 
            }else{
                $materiaSeleccionada = $request->materiasAlimentos;
               
            }

        $CA = Ciclo::where('activa', '=', 1)->first();

        

        if($CA==null){
            $materias = Materia::all();

           $materias->each(function($materias){
                $materias->carreras;
            });

                
             
            $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

            flash('No existe un ciclo activo por favor verifique esto','danger');

            return view('notasAlumnos.create')
            ->with('carrera',$carrera)
            ->with('materias',$materias);           

        }

        $materiaInscrita = MateriaInscrita::where("materia_id", "=",$materiaSeleccionada)
        ->where('activa', '=', 1)
        ->where('ciclo_id', '=', $CA->id)
        ->where('user_id','=',$request->docente)
        ->where('grupo_id','=',$request->grupo)
        ->paginate(150);

        /*$materiaInscrita = DB::table('materias_inscritas') 
        ->where('materia_id', '=', $materiaSeleccionada)
        ->where('activa', '=', 1)
        ->paginate(1000);*/

        //dd($materiaInscrita);

       
        if (count($materiaInscrita)>0) {


            $materiaInscrita->each(function($materiaInscrita){
                $materiaInscrita->estudiante;
            });


            $nota = Nota::orderBy('id','ASC')->paginate(1000);

            $nota->each(function($nota){
                    $nota->materiaInscrita;
            } );


            $join = DB::table('estudiantes')
            ->join('materias_inscritas', 'estudiantes.id', '=', 'materias_inscritas.estudiante_id')
            ->join('notas', 'materias_inscritas.id', '=', 'notas.materiaInscrita_id' )
            ->get();


            //dd($join);
            //dd($materiaInscrita);
           
            return view('notasAlumnos.create2')
            ->with('evaluacion',$evaluacion)
            ->with('materiaSeleccionada',$materiaSeleccionada)
            ->with('nota',$nota)
            ->with('join',$join)
            ->with('materiaInscrita',$materiaInscrita);   
        }//comrueba si existe materia activa
        else{

            flash('No existe un ciclo activo, o no es su grupo teorico verifique por favor','danger');
            $materias = Materia::all();

           $materias->each(function($materias){
                $materias->carreras;
            });

                
             
            $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

            return view('notasAlumnos.create')
            ->with('carrera',$carrera)
            ->with('materias',$materias);
        }
 
    	
    }//FIN DEL METODO SHOW




    //funcion de guardado
    public function store(Request $request){
            $resultado = $request->all();

           // dd($resultado);
            $cuenta = count($resultado);
            
            $notaFinal=0;
            $materiaInscrita=0;
            $llaveAnterior=0;

            foreach($resultado as $key => $value){
                $mykey = $key;

                $nota = Nota::find($mykey);

                if ($nota != null) {

                    $nota->nota_evaluacion = $value;
                    $evaluacion = Evaluacion::find($nota->evaluacion_id);
                    $notaFinal+= ( ( ($evaluacion->porcentaje)/100 ) * $value);
                    $nota->save();

                            
                    $materiaInscrita = $nota->materiaInscrita_id;
                    
                    if($llaveAnterior != $materiaInscrita){
                        $llaveAnterior = $materiaInscrita;
                        $notaFinal = 0;
                        $notaFinal+= ( ( ($evaluacion->porcentaje)/100 ) * $value);
                    }
                    

                    $materia = MateriaInscrita::find($materiaInscrita);
                    $materia->nota_final = $notaFinal;
                    $materia->save();
        
                }


            }




        $materias = Materia::all();

       $materias->each(function($materias){
            $materias->carreras;
        });

            
         
        $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

        flash('Se han guardado las notas con exito', 'success');

        return redirect()->route('notasAlumnos.create')
        ->with('carrera',$carrera)
        ->with('materias',$materias);
    }


    //funcion de visualizacion
    public function index(){

    $materias = Materia::all();

       $materias->each(function($materias){
            $materias->carreras;
        });

            
         
        $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

        return view('notasAlumnos.create3')
        ->with('carrera',$carrera)
        ->with('materias',$materias);

    }

    public function create3(Request $request){

        //dd($request->all());

        $materiaSeleccionada;

        if($request->CarreraElejida == 1){
            $materiaSeleccionada = $request->materiasQuimica; 
        }else{
            $materiaSeleccionada = $request->materiasAlimentos;
           
        }

        $grupos = Grupo::where('materia_id','=',$materiaSeleccionada)->lists('codigo','id');

       // dd($grupos);

        return view('notasAlumnos.grupo2')
        ->with('grupos',$grupos)
        ->with('CarreraElejida',$request->CarreraElejida)
        ->with('materiasAlimentos',$request->materiasAlimentos)
        ->with('materiasQuimica',$request->materiasQuimica);
        
    }

    public function show2(Request $request){


        $carreraElejida = $request->carreraElejida;


        $materiaSeleccionada;

            if($request->CarreraElejida == 1){
                $materiaSeleccionada = $request->materiasQuimica; 
            }else{
                $materiaSeleccionada = $request->materiasAlimentos;
               
            }

        $CA = Ciclo::where('activa', '=', 1)->first();

        

        if($CA==null){
            $materias = Materia::all();

           $materias->each(function($materias){
                $materias->carreras;
            });

                
             
            $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

            flash('No existe un ciclo activo por favor verifique esto','danger');

            return view('notasAlumnos.create3')
            ->with('carrera',$carrera)
            ->with('materias',$materias);           

        }

        $materiaInscrita = MateriaInscrita::where("materia_id", "=",$materiaSeleccionada)
        ->where('activa', '=', 1)
        ->where('ciclo_id', '=', $CA->id)
        ->where('user_id','=',$request->docente)
        ->where('grupo_id','=',$request->grupo)
        ->paginate(150);

        /*$materiaInscrita = DB::table('materias_inscritas') 
        ->where('materia_id', '=', $materiaSeleccionada)
        ->where('activa', '=', 1)
        ->paginate(1000);*/

        //dd($materiaInscrita);

       
        if (count($materiaInscrita)>0) {


            $materiaInscrita->each(function($materiaInscrita){
                $materiaInscrita->estudiante;
            });

           
            return view('notasAlumnos.eliminar')
            ->with('materiaSeleccionada',$materiaSeleccionada)
            ->with('materiaInscrita',$materiaInscrita);   
        }//comrueba si existe materia activa
        else{

            flash('No existe un ciclo activo, o no es su grupo teorico verifique por favor','danger');
            $materias = Materia::all();

           $materias->each(function($materias){
                $materias->carreras;
            });

                
             
            $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

            return view('notasAlumnos.create3')
            ->with('carrera',$carrera)
            ->with('materias',$materias);
        }


    }    

    //funcion de eliminacion
    public function destroy(Request $request){

        $todo =  $request->all();

        $i=0;
        foreach ($todo as $t) {
         if($i==0){
            $i++;
         }else{
            
            $mat = MateriaInscrita::where('id', '=', $t)->delete();
         }

        }

        flash('Se han eliminado los registros con exito','warning');
        

        return redirect('ingresarNotas/ver');
    }




    //funcion de edicion 1/2
    public function edit($id){



    }



    //funcion de edicion 2/2
   public function update(Request $request, $id){

   } 


}
