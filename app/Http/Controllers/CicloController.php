<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ciclo;
use App\Evaluacion;
use App\MateriaInscrita;
use App\Nota;


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
    public function store(Request $request){
        //dd($request->all());

        $activo = Ciclo::where('activa', '=', 1)->get();
        $activa = 0;
        $ciclo = new Ciclo();


        foreach ($activo as $ac) {
            $activa+=1;
        }


        if($activa == 0 && ($request->cicloActivo) == 1){
           
            $fecha = '';    


            $ciclo->codigo =  $request->codigo;
            $ciclo->ciclo_academico = $request->ciclo;
            $ciclo->anio_academico = $request->anio;
            $ciclo->fecha_inicio = $request->fechaInicio;
            
            $ciclo->fecha_fin = $request->fechaFin;

           // $ciclo->fecha_inicio =  str_replace("/", "-", $request->fechaInicio);
           // $ciclo->fecha_fin =  str_replace("/", "-", $request->fechaFin);       

            $ciclo->activa = $request->cicloActivo;

            $ciclo->save();

            flash('Se ha creado el ciclo con exito', 'success');

            
            return redirect()->route('ciclo.index');
        }elseif ($activa == 0 && $request->cicloActivo == 0) {
            
            $fecha = '';    


            $ciclo->codigo =  $request->codigo;
            $ciclo->ciclo_academico = $request->ciclo;
            $ciclo->anio_academico = $request->anio;
            $ciclo->fecha_inicio = $request->fechaInicio;
            
            $ciclo->fecha_fin = $request->fechaFin;

           // $ciclo->fecha_inicio =  str_replace("/", "-", $request->fechaInicio);
           // $ciclo->fecha_fin =  str_replace("/", "-", $request->fechaFin);       

            $ciclo->activa = $request->cicloActivo;

            $ciclo->save();

            flash('Se ha creado el ciclo con exito', 'success');
            return redirect()->route('ciclo.index');

        }elseif ($activa > 0 && $request->cicloActivo == 0) {
           
            $fecha = '';    


            $ciclo->codigo =  $request->codigo;
            $ciclo->ciclo_academico = $request->ciclo;
            $ciclo->anio_academico = $request->anio;
            $ciclo->fecha_inicio = $request->fechaInicio;
            
            $ciclo->fecha_fin = $request->fechaFin;

           // $ciclo->fecha_inicio =  str_replace("/", "-", $request->fechaInicio);
           // $ciclo->fecha_fin =  str_replace("/", "-", $request->fechaFin);       

            $ciclo->activa = $request->cicloActivo;

            $ciclo->save();

            flash('Se ha creado el ciclo con exito', 'success');
            return redirect()->route('ciclo.index');
        }else{

            flash('Ya existe un ciclo activo por favor asegurese de haber finalizado ciclos anteriores', 'warning');

            //return redirect()->route('ciclo.index');
            return redirect()->route('ciclo.index');
        }

    }//fin del metodo store

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
        $ciclo = Ciclo::find($id);
        
 
       //dd($evaluacion);

        return view('ciclo.edit')
       ->with('ciclo',$ciclo);
       
        

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


        $ciclo = Ciclo::find($id);
        

        $ciclo->codigo =  $request->codigo;
        $ciclo->ciclo_academico = $request->ciclo;
        $ciclo->anio_academico = $request->anio;
        $ciclo->fecha_inicio = $request->fechaInicio;
        $ciclo->fecha_fin = $request->fechaFin;

        $estadoAnt = $request->estadoAnterior;
        
        if ($estadoAnt < $request->cicloActivo) {
            //caso cuando el estado anterior es 0 y pasa a 1

                $activo = Ciclo::where('activa', '=', 1)->get();
                $activa = 0;

                foreach ($activo as $ac) {
                    $activa+=1;
                }

                if ($activa>0) {
                    flash('Ya existe un ciclo activo por favor asegurese de haber finalizado ciclos anteriores', 'warning');

            //return redirect()->route('ciclo.index');
                    return redirect()->route('ciclo.index');
                }else{
                    $matIns = MateriaInscrita::where('ciclo_id', '=', $id)->get();

                    foreach ($matIns as $mat) {
                        $mat->activa = 1;

                        $mat->save();
                    }

                    $ciclo->activa = $request->cicloActivo;
                    $ciclo->save();

                    flash('Se ha actualizado el ciclo con exito', 'success');

        
                    return redirect()->route('ciclo.index');

                }

        }else{
            //caso cuando el estado es 1 y pasa a cero o es 0 y se queda en cero
            
             

            $matIns = MateriaInscrita::where('ciclo_id', '=', $id)->get();

            foreach ($matIns as $mat) {
                $mat->activa = 0;

                $mat->save();
            } 

            $evaluacion = Evaluacion::where('activa', '=', 1)->get();

            foreach ($evaluacion as $eva) {
                $eva->activa = 0;

                $eva->save();
            } 

            $ciclo->activa = $request->cicloActivo;
            $ciclo->save();
            flash('Se ha actualizado el ciclo con exito', 'success');

        
            return redirect()->route('ciclo.index');
        }






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