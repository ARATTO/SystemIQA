<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use App\Materia;
use Laracasts\Flash\Flash;
use App\Carrera;

class MateriasController extends Controller
{
   public function index(){
   		$mats = Materia::orderBy('codigo')->paginate(5);
        $carreras = Carrera::orderBy('id')->lists('nombre','id');
        $car=null;
    	return view('materias.index')
                ->with('mats',$mats)
                ->with('car',$car)
                ->with('carreras',$carreras);
    }


	public function  create(Request $request){
		$carreras = Carrera::orderBy('id')->lists('nombre','id');
		 return View::make('materias.create')->with('carreras',$carreras);

    }

    public function store(Request $request){
    	$mat = new Materia($request->all());
    	$mat->save();
        $mat->carreras()->sync($request->ids); //Para tablas de muchos a muchos

    	Flash::success("La asignatura : ".$mat->nombre." se ha registrado exitosamente."  );
         
    	return redirect()->route('materias.create');
    }


    public function show($id){

    }

    public function edit($id){
        $mat = Materia::find($id);        
        $mat->carreras;
        $carreras = Carrera::orderBy('id')->lists('nombre','id');   //Para desplegar toda la lista
        
        $mat_carreras= $mat->carreras->lists('id')->ToArray();      //Mostrar las carreras a las cuales pertenece    
        return view('materias.edit')
            ->with('mat',$mat)
            ->with('carreras',$carreras)
            ->with('mat_carreras',$mat_carreras);
    }

    public function update(Request $request,$id){
        $mat = Materia::find($id);
        $mat->fill($request->all());
        $mat->save();

        $mat->carreras()->sync($request->ids);
        Flash::success("La asignatura:  ".$mat->nombre." se ha modificado exitosamente.");

        return redirect()->route('materias.index');
    }

    public function destroy($id){

        $mat = Materia::find($id);
        $mat->delete();
        
        Flash::success("La asignatura:  ".$mat->nombre." se ha eliminado exitosamente.");
    
        return redirect()->route('materias.index');

    }


    public function filtrarMaterias($id){
        $carrera=Carrera::find($id);
        $mats=$carrera->materias()->paginate(3);
        $carreras = Carrera::orderBy('id')->lists('nombre','id');

        return view('materias.index')
                ->with('mats',$mats)
                ->with('car',$id)
                ->with('carreras',$carreras);
    }

    public function eliminar($id){
        
         $mat = Materia::find($id);
        $mat->delete();
        
        Flash::success("La asignatura:  ".$mat->nombre." se ha eliminado exitosamente.");
    
        return redirect()->route('materias.index');
    }

}
    