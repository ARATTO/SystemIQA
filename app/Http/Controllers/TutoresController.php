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

}
