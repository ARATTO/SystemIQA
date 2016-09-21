<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;

use App\Carrera;
use App\Materia;
class CarrerasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function index(){
        $carreras = Carrera::orderBy('id')->paginate(5);
    	return view('carreras.index')->with('carreras',$carreras);           
    }


	public function create(Request $request){
		 return view('carreras.create');	
    }

    public function store(Request $request){
    	$car = new Carrera($request->all());
    	$car->save();
    	Flash::success("La carrera : ".$car->nombre." se ha registrado exitosamente."  ); 
    	return redirect()->route('carreras.create');
    }


    public function show($id){

    }

    public function edit($id){
        $carrera = Carrera::find($id);        
       
      
        return view('carreras.edit')
            ->with('carrera',$carrera);
    }

    public function update(Request $request,$id){
        $car = Carrera::find($id);
        $car->fill($request->all());
        $car->save();

        Flash::success("La carrera:  ".$car->nombre." se ha modificado exitosamente.");
        return redirect()->route('carreras.index');
    }

    public function destroy($id){

        $car = Carrera::find($id);
        $car->delete();
        
        Flash::success("La carrera:  ".$car->nombre." se ha eliminado exitosamente.");
    
        return redirect()->route('carreras.index');

    }


    public function eliminar($id){
        
       $car = Carrera::find($id);
        $car->delete();
        
        Flash::success("La carrera:  ".$car->nombre." se ha eliminado exitosamente.");
    
        return redirect()->route('carreras.index');
    }
}
