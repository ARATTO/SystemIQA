<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ciclo;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos = Ciclo::orderBy('id','ASC')->paginate(10);

     

        //$evaluaciones = $evaluaciones->paginate(10);

    
        return view('ciclo.index')->with('ciclos',$ciclos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciclo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());


        $ciclo = new Ciclo();

        $fecha = '';    


        $ciclo->codigo =  $request->codigo;
        $ciclo->ciclo_academico = $request->ciclo;
        $ciclo->anio_academico = $request->anio;
        $ciclo->fecha_inicio = $request->fechaInicio;
        
        $ciclo->fecha_fin = $request->fechaFin;

       // $ciclo->fecha_inicio =  str_replace("/", "-", $request->fechaInicio);
       // $ciclo->fecha_fin =  str_replace("/", "-", $request->fechaFin);       


        
        //$ciclo->activo = $request->cicloActivo;

        $ciclo->save();

        flash('Se ha creado el ciclo con exito', 'success');

        
        return redirect()->route('ciclo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('ciclo.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ciclo = Ciclo::where('id', '=', $id)->delete();

        flash('Se han borrado el ciclo', 'danger' );

        return redirect()->route('ciclo.index');

    }
}
