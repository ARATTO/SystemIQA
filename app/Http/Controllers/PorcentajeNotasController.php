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
                    
                    if ($evaluacion[$i] != "") {

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
    	$evaluacion = Evaluacion::orderBy('id','ASC')->paginate(10);

 
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

        $carrera = Carrera::find($id);

       // $materias = Materia::orderBy('nombre','DESC')->lists('nombre','id');

        $mis_materias = Materia::find($id);

        return view('Pnotas.edit')
        ->with('carrera',$carrera)
        ->with('mis_materias',$mis_materias);
        
    }



    //funcion de edicion 2/2
   public function update(Request $request, $id){/*
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;

        $user->save();

        flash("se ha actualizado ". $user->name." de forma exitosa", 'warning');
        return redirect()->route('admin.users.index');*/

        return redirect()->route('Pnotas.index');
   } 


}
