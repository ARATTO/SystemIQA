<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;

use App\Carrera;
use App\Materia;
use App\TipoGrupo;
use App\Grupo;

class GruposController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function index(){
        $grupos = Grupo::orderBy('codigo')->paginate(5);
        //dd($grupos);
        $grupos->each(function($grupos){
            $grupos->materia;
            $grupos->tipo_grupo;
        });        
        //dd($grupos);
    	return view('grupos.index')->with('grupos',$grupos);           
    }


	public function create(Request $request){
        $materias=Materia::orderBy('codigo')->lists('nombre','id');
        $tipos_grupo= TipoGrupo::orderBy('id')->lists('nombre','id');

		 return view('grupos.create')
                ->with('materias',$materias)
                ->with('tipos_grupo',$tipos_grupo);	
    }

    public function store(Request $request){
    	$grupo = new Grupo($request->all());
        
    	$grupo->save();
    	Flash::success("El grupo : ".$grupo->nombre." se ha registrado exitosamente."  ); 
    	return redirect()->route('grupos.index');
    }


    public function show($id){

    }

    public function edit($id){
         //dd($id);
        $grupo = Grupo::find($id);
        $materias=Materia::orderBy('codigo')->lists('nombre','id');
        $tipos_grupo= TipoGrupo::orderBy('id')->lists('nombre','id');

        return view('grupos.edit')
            ->with('materias',$materias)
            ->with('tipos_grupo',$tipos_grupo)
            ->with('grupo',$grupo);
    }

    public function update(Request $request,$id){
        $grupo = Grupo::find($id);
        $grupo->fill($request->all());
        $grupo->save();
        

        Flash::success("El grupo:  ".$grupo->codigo." se ha modificado exitosamente.");
        return redirect()->route('grupos.index');
    }

    public function destroy($id){
        $grupo = Grupo::find($id);
        $grupo->delete();
        Flash::success("El grupo: ".$grupo->codigo." se ha eliminado exitosamente.");
        return redirect()->route('grupos.index');
    }

}
