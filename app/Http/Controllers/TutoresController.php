<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use View;
use App\Tutor;
use App\User;
use Laracasts\Flash\Flash;

class TutoresController extends Controller
{
	public function index()
	{
		$tutors = Tutor::orderBy('id', 'ASC')->paginate(20);

		return view('tutor.index')->with('tutors', $tutors);
	}

    //
	public function create()
	{
		return view('tutor.create');
	}

	public function store(Request $request)
	{
		$tutor = new Tutor($request->all());
		$tutor -> save(); 
		dd('Usuario creado');
	}	

	public function destroy($id)
	{
		$tutor = Tutor::find($id);
		$tutor->delete();

		Flash::error('El tutor ' . $tutor->nombre . $tutor->apellido . ' ha sido borrado exitosamente');
		return redirect()->route('tutor.index');
	}

	public function edit($id)
	{
		$tutor = Tutor::find($id);
		return view('tutor.edit')->with('tutor', $tutor);
	}

	public function update(Request $request, $id)
	{

		$tutor = Tutor::find($id);
		/*$tutor->nombre = $request->nombre;
		$tutor->apellido = $request->apellido;
		$tutor->telefono = $request->telefono;*/
		$tutor->fill($request->all());
		$tutor->save();
		Flash::warning('El usuario fue actualizado.');
		return redirect()->route('tutor.index');
	}

}
