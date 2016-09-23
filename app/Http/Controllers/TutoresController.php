<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use View;
use App\Tutor;
use App\User;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;

class TutoresController extends Controller
{

	public function __construct()
   	{
   		$this->middleware('auth');
   	}

	public function index()
	{
		$tutors = Tutor::orderBy('id', 'ASC')->paginate(4);
		$users = User::all();

		return view('tutor.index')->with(['users'=>$users,'tutors'=>$tutors]);
	}

    //
	public function create()
	{
		return view('tutor.create');
	}

	public function store(Request $request)
	{
		$tutor = new Tutor($request->all());
		$user = Auth::user();

		$tutor->usuario_id = $user->id;

		$tutor -> save(); 
		return redirect()->route('tutor.index');
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

		$tutor->nombre = $request->nombre;
		$tutor->apellido = $request->apellido;
		$tutor->telefono = $request->telefono;

		
		//$tutor->fill($request->all());
		$tutor->save();
		Flash::warning('El usuario con id ' . $tutor->id . ' fue actualizado.');
		return redirect()->route('tutor.index');
	}

	public function show($id)
	{

	}

}
