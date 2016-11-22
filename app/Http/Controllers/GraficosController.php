<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\User;
use App\Rol;
use Laracasts\Flash\Flash;
use App\Carrera;
use App\Materia;
use App\Ciclo;
use DB;

class GraficosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        
        $materias = Materia::all();

        $materias->each(function($materias){
            $materias->carreras;
        });

        $carrera = Carrera::orderBy('nombre','ASC')->lists('nombre','id');

        return view('graficos.index')
        ->with('carrera',$carrera)
        ->with('materias',$materias);
        
        //return view('graficos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
            dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        
    }
    
    
    public function PorMateriaActual(Request $request) {
        //dd($request);
        //dd("Materia Actual");
            //Carrera
            $Carrera = $request->CarreraElejidaActual;
            //Materia
            if($request->materiasAlimentos){
                $Materia = $request->materiasAlimentos;
            }else{
                $Materia = $request->materiasQuimica;
            }
            //Ciclo
            $CicloActual = DB::table('ciclos')->where('activa', '=', 1)->first();
            $Ciclo = $CicloActual->id;
            
            $NMateria = DB::table('materias')->where('id', '=', $Materia)->first();
            $NomMateria = $NMateria->nombre;
            //dd($NomMateria);
            $NCarrera = DB::table('carreras')->where('id', '=', $Carrera)->first();
            $NomCarrera = $NCarrera->nombre;
            
             
            //Notas
            $Notas = DB::table('materias_inscritas')
                    ->join('carrera_materia', 'carrera_materia.materia_id', '=', 'materias_inscritas.materia_id')                 
                    ->join('estudiantes', 'estudiantes.id', '=', 'materias_inscritas.estudiante_id')                   
                    ->where('carrera_id', '=', $Carrera)
                    ->where('ciclo_id', '=', $Ciclo)
                    ->select('materias_inscritas.nota_final', 'materias_inscritas.materia_id', 'estudiantes.carnet')
                    ->orderBy('materias_inscritas.nota_final', 'desc')
                    ->get();
            
            //Recorrido
          
            foreach ($Notas as $nota) {
                if($nota->materia_id == $Materia){
                    $Datos [] = $nota->nota_final;
                    $Carnet [] = $nota->carnet;
                }
            }
            
            //dd($Notas);
            //dd("Carrera" . $Carrera . "Materia" . $Materia);
       
            return view('graficos.grafico_materia_actual')
                    ->with('materia', $NomMateria)
                    ->with('carrera' , $NomCarrera)
                    ->with('Datos', $Datos)
                    ->with('Carnet', $Carnet);

    }
    
    public function PorMateriaCiclos(Request $request) {
        //dd($request);
        dd("Materia Ciclos");
        if($request->tipo_grafico == 1){
            return redirect()->route('users/grafico_materia_actual');
        }
    }
    
    public function GlobalPera(Request $request) {
        dd("Global PERA");
    }
}
