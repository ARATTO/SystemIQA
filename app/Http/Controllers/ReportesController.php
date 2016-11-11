<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Materia;
use App\Carrera;
use App\Estudiante;
use View;
use PDF;

class ReportesController extends Controller
{
     public function __construct()
   	{
   		$this->middleware('auth');
   	}

   	public function index(Request $request)
    {
          //$users = User::carnet($request->carnet)->orderBy('id','DESC')->paginate(6);
          //$rols = Rol::all();
          //flash()->overlay('Modal Message', 'Modal Title');
          return view('home');
    }
    public function CrearListadoEstudiantes(Request $request){

    	 $materias = Materia::all();

       	 $materias->each(function($materias){
            $materias->carreras;
         });
  
        $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

        return view('reportes.listado_estudiantes')
        ->with('carrera',$carrera)
        ->with('materias',$materias);
    	
    }

    public function GenerarPDFListadoEstudiantes(Request $request){
      $carrera = Carrera::find($request->CarreraElegida);
      $materia = Materia::find($request->materia_elegida);
      $estudiantes = Estudiante::all();
      $data = ['estudiantes'=>$estudiantes,'carrera'=>$carrera,'materia'=>$materia];

      
		  $pdf= PDF::loadView('reportes.pdfs.listado_estudiantes_pdf',$data);

		  return $pdf->stream('Estudiantes.pdf');

    }
}
