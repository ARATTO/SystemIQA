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

class IngresarNotasController extends Controller
{
    
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



    public function show(Request $request){

        $carreraElejida = $request->carreraElejida;


        $evaluacion = Evaluacion::all();

       $evaluacion->each(function($evaluacion){
            $evaluacion->materia;
            //dd($evaluacion);
        });


        $materiaSeleccionada;

            if($request->CarreraElejida == 2){
                $materiaSeleccionada = $request->materiasQuimica; 
            }else{
                $materiaSeleccionada = $request->materiasAlimentos;
               
            }

        $materiaInscrita = MateriaInscrita::where("materia_id", "=",$materiaSeleccionada)->paginate(1000);

        $materiaInscrita->each(function($materiaInscrita){
            $materiaInscrita->estudiante;
        } );


        $nota = Nota::orderBy('id','ASC')->paginate(1000);

        $nota->each(function($nota){
                $nota->materiaInscrita;
        } );


        $join = DB::table('estudiantes')
    ->join('materias_inscritas', 'estudiantes.id', '=', 'materias_inscritas.estudiante_id')
    ->join('notas', 'materias_inscritas.id', '=', 'notas.materiaInscrita_id' )
                    ->get();

        //dd($join);

                    //oin('orders', 'users.id', '=', 'orders.user_id')

        //dd($request);
        //dd($materiaSeleccionada);
       
        return view('notasAlumnos.create2')
        ->with('evaluacion',$evaluacion)
        ->with('materiaSeleccionada',$materiaSeleccionada)
        ->with('nota',$nota)
        ->with('join',$join)
        ->with('materiaInscrita',$materiaInscrita);    
    	
    }




    //funcion de guardado
    public function store(Request $request){
            $resultado = $request->all();

           // dd($resultado);
            $cuenta = count($resultado);
  

            foreach($resultado as $key => $value){
                $mykey = $key;
                echo "llave: ".$mykey;
                echo "  nota: ".$value. "<br>";

                $nota = Nota::find($mykey);

                if ($nota != null) {
                    $nota->nota_final = $value;

                    $nota->save();
                }

            }


        $materias = Materia::all();

       $materias->each(function($materias){
            $materias->carreras;
        });

            
         
        $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

        flash('Se han guardado las notas con exito');

        return redirect()->route('notasAlumnos.create')
        ->with('carrera',$carrera)
        ->with('materias',$materias);
    }


    //funcion de visualizacion
    public function index(){



    }

    //funcion de eliminacion
    public function destroy($id){


    
    }




    //funcion de edicion 1/2
    public function edit($id){



    }



    //funcion de edicion 2/2
   public function update(Request $request, $id){

   } 


}
