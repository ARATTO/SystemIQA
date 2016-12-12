<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Materia;
use App\Carrera;
use App\Estudiante;
use App\MateriaInscrita;
use App\Ciclo;
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
      $estudiantes = Estudiante::orderBy('carnet','ASC')->get();
      $data = ['estudiantes'=>$estudiantes,'carrera'=>$carrera,'materia'=>$materia];

      
		  $pdf= PDF::loadView('reportes.pdfs.listado_estudiantes_pdf',$data);
		  return $pdf->stream('Estudiantes.pdf');
    }


    public function GenerarPDFListadoEstudiantesPera(Request $request){

      $estudiantes = Estudiante::where('CUM','<',7)->orderBy('carnet','ASC')->get();
      $data = ['estudiantes'=>$estudiantes];

      $pdf= PDF::loadView('reportes.pdfs.estudiantes_cum_bajo_pdf',$data);
      return $pdf->stream('PeligroPERA.pdf');
    }

  public function GenerarPDFListadoEstudiantesServicioSocial(Request $request){

      $CA = Ciclo::where('activa', '=', 1)->first();

      $materiaInscrita = MateriaInscrita::where('activa', '=', 1)
      ->where('ciclo_id', '=', $CA->id)
      ->orderBy('nota_final', 'asc')
      ->paginate(1000);


      $materiaInscrita->each(function($materiaInscrita){
          $materiaInscrita->estudiante;
      } );
 

      $data = ['estudiantes'=>$materiaInscrita];
      $pdf= PDF::loadView('reportes.pdfs.estudiantes_aptos_servicio_social_pdf',$data);
      return $pdf->stream('ServicioSocial.pdf');

    }
    

}
