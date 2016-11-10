<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Materia;
use App\Evaluacion;
use App\Carrera;
use App\MateriaInscrita;
use App\Ciclo;
use App\Http\Requests\PorcentajeNotasRequest;

use DB;

class PorcentajeNotasController extends Controller
{

        
     public function __construct()
    {
        $this->middleware('auth');
    }

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


       /* $prueba = DB::table('materias_inscritas') 
       -> where('nota_final', '>', '0')
       ->where('materia_id', '=', '1')
       ->count();*/
       
        $activo = Ciclo::where('activa', '=', 1)->get();
        $activa = 0;

        foreach ($activo as $ac) {
            $activa+=1;
        }

       if($activa>0){
        //encontro un ciclo activo
            $evaluacion[0] = $request->nota1;
            $evaluacion[1] = $request->nota2;
            $evaluacion[2] = $request->nota3;
            $evaluacion[3] = $request->nota4;
            $evaluacion[4] = $request->nota5;
            $evaluacion[5] = $request->nota6;
            $evaluacion[6] = $request->nota7;
            $evaluacion[7] = $request->nota8;
            $evaluacion[8] = $request->nota9;
            $evaluacion[9] = $request->nota10;

            $descripcion[0] = $request->Descr1;
            $descripcion[1] = $request->Descr2;
            $descripcion[2] = $request->Descr3;
            $descripcion[3] = $request->Descr4;
            $descripcion[4] = $request->Descr5;
            $descripcion[5] = $request->Descr6;
            $descripcion[6] = $request->Descr7;
            $descripcion[7] = $request->Descr8;
            $descripcion[8] = $request->Descr9;
            $descripcion[9] = $request->Descr10;


            $porcentaje =0;

            for($i=0; $i<10; $i++){
                $porcentaje+=$evaluacion[$i];
            }



            if ($porcentaje == 100) {
        
                    for ($i=0; $i<10 ; $i++) { 
                        
                        if ($evaluacion[$i] != "" && $evaluacion[$i]>0) {

                            $evaluacionN =  new Evaluacion();
                            $evaluacionN->porcentaje = $evaluacion[$i];
                            $evaluacionN->descripcion = $descripcion[$i];
                            $evaluacionN->materia_id = $request->id;
                            $evaluacionN->activa = 1;
                            $evaluacionN->save();
                        }
                    }

                flash('Se han creado los porcentajes con exito', 'success');

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
       }else{// fin del if general, comprobacion de ciclo activo
            flash('No existe un ciclo activo, por favor verifique esto', 'danger' );
            $carrera = Carrera::find($request->IdCarrera);

            $materias = Materia::orderBy('nombre','DESC')->lists('nombre','id');

            $mis_materias = $carrera->materias->lists('nombre','id')->ToArray();

            return view('Pnotas.create2')
            ->with('carrera',$carrera)
            ->with('mis_materias',$mis_materias);

       }



    } // final del metodo store


    //funcion de visualizacion
    public function index(){

    	$evaluacion = Evaluacion::orderBy('id','ASC')->paginate(10);

        $evaluacion->each(function($evaluacion){
            $evaluacion->materia;
  
        });

        $materia=0;
        $evaluaciones = array();

        foreach ($evaluacion as $key => $value) {

            if ($materia != $value->materia->id) {
                $materia = $value->materia->id;

                $evaluaciones[]  = $value;
            }

        }

        //$evaluaciones = $evaluaciones->paginate(10);

    
        return view('Pnotas.index')->with('evaluaciones',$evaluaciones);

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
        } );

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

        $activo = Ciclo::where('activa', '=', 1)->get();
        $activa = 0;

        foreach ($activo as $ac) {
            $activa+=1;
        }

       if($activa>0){

            $evaluacion[0] = $request->nota1;
            $evaluacion[1] = $request->nota2;
            $evaluacion[2] = $request->nota3;
            $evaluacion[3] = $request->nota4;
            $evaluacion[4] = $request->nota5;
            $evaluacion[5] = $request->nota6;
            $evaluacion[6] = $request->nota7;
            $evaluacion[7] = $request->nota8;
            $evaluacion[8] = $request->nota9;
            $evaluacion[9] = $request->nota10;

            $descripcion[0] = $request->Descr1;
            $descripcion[1] = $request->Descr2;
            $descripcion[2] = $request->Descr3;
            $descripcion[3] = $request->Descr4;
            $descripcion[4] = $request->Descr5;
            $descripcion[5] = $request->Descr6;
            $descripcion[6] = $request->Descr7;
            $descripcion[7] = $request->Descr8;
            $descripcion[8] = $request->Descr9;
            $descripcion[9] = $request->Descr10;


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

                flash('Se han actualizado los porcentajes ccon exito', 'success');

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

        }else{// fin del if general, comprobacion de ciclo activo
        flash('No existe un ciclo activo, por favor verifique esto', 'danger' );
        $carrera = Carrera::find($request->IdCarrera);

        $materias = Materia::orderBy('nombre','DESC')->lists('nombre','id');

        $mis_materias = $carrera->materias->lists('nombre','id')->ToArray();

        return view('Pnotas.create2')
        ->with('carrera',$carrera)
        ->with('mis_materias',$mis_materias);

       }
   } //fin del metodo update




   public function verPorcentajes($id){

        $evaluacion = Evaluacion::where('materia_id', "=", $id)->paginate(10);

        $evaluacion->each(function($evaluacion){
            $evaluacion->materia;
  
        });

        $materia=0;
        $evaluaciones = array();

        foreach ($evaluacion as $key => $value) {

            if ($materia != $value->materia->id) {
                $materia = $value->materia->id;

                $evaluaciones[]  = $value;
            }

        }


    
        return view('Pnotas.ver')->with('evaluaciones',$evaluacion);
   }


}
