<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Materia;
use App\Evaluacion;
use App\Carrera;
use App\Http\Requests\PorcentajeNotasRequest;

class PorcentajeNotasController extends Controller
{

    public function create(){

        $carreras = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

        return view('Pnotas.create')
        ->with('carreras',$carreras);

    }



    public function show(Request $request){

        $carrera = Carrera::find($request->id);

        $materias = Materia::orderBy('nombre','DESC')->lists('nombre','id');

        $mis_materias = $carrera->materias->lists('nombre','id')->ToArray();

        return view('Pnotas.create2')
        ->with('carrera',$carrera)
        ->with('mis_materias',$mis_materias);
    }

    //funcion de guardado
    public function store(PorcentajeNotasRequest $request){


        $evaluacion[0] = $request->Evaluacion1;
        $evaluacion[1] = $request->Evaluacion2;
        $evaluacion[2] = $request->Evaluacion3;
        $evaluacion[3] = $request->Evaluacion4;
        $evaluacion[4] = $request->Evaluacion5;
        $evaluacion[5] = $request->Evaluacion6;
        $evaluacion[6] = $request->Evaluacion7;
        $evaluacion[7] = $request->Evaluacion8;
        $evaluacion[8] = $request->Evaluacion9;
        $evaluacion[9] = $request->Evaluacion10;

        $descripcion[0] = $request->descripcion1;
        $descripcion[1] = $request->descripcion2;
        $descripcion[2] = $request->descripcion3;
        $descripcion[3] = $request->descripcion4;
        $descripcion[4] = $request->descripcion5;
        $descripcion[5] = $request->descripcion6;
        $descripcion[6] = $request->descripcion7;
        $descripcion[7] = $request->descripcion8;
        $descripcion[8] = $request->descripcion9;
        $descripcion[9] = $request->descripcion10;


        $porcentaje =0;

        for($i=0; $i<10; $i++){
            $porcentaje+=$evaluacion[$i];
        }



        if ($porcentaje == 100) {
            ///dd($request->all());
                for ($i=0; $i<10 ; $i++) { 
                    
                    if ($evaluacion[$i] != "" && $evaluacion[$i]>0) {

                        $evaluacionN =  new Evaluacion();
                        $evaluacionN->porcentaje = $evaluacion[$i];
                        $evaluacionN->descripcion = $descripcion[$i];
                        $evaluacionN->materia_id = $request->id;

                        $evaluacionN->save();
                    }
                }

            flash('Se han creado los porcentajes ccon exito');

            return redirect()->route('Pnotas.index');

        }else{

        flash('LA SUMATORIA NO ES DE 100', 'danger' );

        $carrera = Carrera::find($request->IdCarrera);

        $materias = Materia::orderBy('nombre','DESC')->lists('nombre','id');

        $mis_materias = $carrera->materias->lists('nombre','id')->ToArray();

        return view('Pnotas.create2')
        ->with('carrera',$carrera)
        ->with('mis_materias',$mis_materias);

        }

    }


    //funcion de visualizacion
    public function index(){

        //$materia = Materia::orderBy('id','ASC')->lists('nombre', 'id');        

        //$materia = Materia::find(1);
    	$evaluacion = Evaluacion::orderBy('id','ASC')->paginate(10);

        $evaluacion->each(function($evaluacion){
            $evaluacion->materia;
            //dd($evaluacion->materia->nombre);
        });

        
 
        return view('Pnotas.index')->with('evaluaciones',$evaluacion);

    }

    //funcion de eliminacion
    public function destroy($id){

        $evaluacion = Evaluacion::where('materia_id', '=', $id)->delete();

        flash('Se han borrado los porcentajes', 'danger' );

        return redirect()->route('Pnotas.index');

    
    }




    //funcion de edicion 1/2
    public function edit($id){


       $mis_materias = Materia::find($id);
        
 
        $numeroEvaluaciones = 0;

        $evaluacion = Evaluacion::where('materia_id', '=', $id)->get();

        $evaluacion->each(
            function($evaluacion){
                $evaluacion->materia;
                }

            //dd($evaluacion);                
        );

        foreach ($evaluacion as $ev) {
            $numeroEvaluaciones+=1;
        }


       //dd($evaluacion);

        return view('Pnotas.edit')
       ->with('evaluaciones',$evaluacion)
       ->with('numeroEvaluaciones',$numeroEvaluaciones)
       ->with('mis_materias',$mis_materias);  

        //return redirect()->route('Pnotas.pruebaEditar');

    }



    //funcion de edicion 2/2
   public function update(Request $request, $id){


        $evaluacion[0] = $request->Evaluacion1;
        $evaluacion[1] = $request->Evaluacion2;
        $evaluacion[2] = $request->Evaluacion3;
        $evaluacion[3] = $request->Evaluacion4;
        $evaluacion[4] = $request->Evaluacion5;
        $evaluacion[5] = $request->Evaluacion6;
        $evaluacion[6] = $request->Evaluacion7;
        $evaluacion[7] = $request->Evaluacion8;
        $evaluacion[8] = $request->Evaluacion9;
        $evaluacion[9] = $request->Evaluacion10;

        $descripcion[0] = $request->descripcion1;
        $descripcion[1] = $request->descripcion2;
        $descripcion[2] = $request->descripcion3;
        $descripcion[3] = $request->descripcion4;
        $descripcion[4] = $request->descripcion5;
        $descripcion[5] = $request->descripcion6;
        $descripcion[6] = $request->descripcion7;
        $descripcion[7] = $request->descripcion8;
        $descripcion[8] = $request->descripcion9;
        $descripcion[9] = $request->descripcion10;


        $NuEva = $request->NERE;

        $Ieva = $request->NEID - ($NuEva-1);

        $porcentaje =0;

        for($i=0; $i<10; $i++){
            $porcentaje+=$evaluacion[$i];
        }



        if ($porcentaje == 100) {
            ///dd($request->all());
                for ($i=0; $i<10 ; $i++) { 
                    
                    if ($evaluacion[$i] != "" && $evaluacion[$i]>0) {


                        $evaluacionN =  Evaluacion::find($Ieva);
                        $evaluacionN->porcentaje = $evaluacion[$i];
                        $evaluacionN->descripcion = $descripcion[$i];
                        $evaluacionN->materia_id = $request->IDMAT;

                        $evaluacionN->save();
                        $Ieva++;
                    }

                }

            flash('Se han actualizado los porcentajes ccon exito');

            return redirect()->route('Pnotas.index');

        }else{

        flash('LA SUMATORIA NO ES DE 100', 'danger' );

        $carrera = Carrera::find($request->IdCarrera);

        $materias = Materia::orderBy('nombre','DESC')->lists('nombre','id');

        $mis_materias = $carrera->materias->lists('nombre','id')->ToArray();

        return view('Pnotas.create2')
        ->with('carrera',$carrera)
        ->with('mis_materias',$mis_materias);

        }

        flash("se ha actualizado de forma exitosa", 'warning');
        return redirect()->route('Pnotas.index');
   } 


       public function pruebaEditar(){

                $mis_materias = Materia::find(4);
                
                //return redirect()->route('Pnotas.pruebaEditar');
                $numeroEvaluaciones = 0;

                $evaluacion = Evaluacion::where('materia_id', '=', 4)->get();

                $evaluacion->each(
                    function($evaluacion){
                        $evaluacion->materia;
                        }

                    //dd($evaluacion);                
                );

                foreach ($evaluacion as $ev) {
                    $numeroEvaluaciones+=1;
                }


               //dd($evaluacion );

                return view('Pnotas.edit')
               ->with('evaluaciones',$evaluacion)
               ->with('numeroEvaluaciones',$numeroEvaluaciones)
               ->with('mis_materias',$mis_materias); 


        }

}
