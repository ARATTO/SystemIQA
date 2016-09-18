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
		$tutors = Tutor::orderBy('id', 'ASC')->paginate(5);

		return view('admin.tutor.index')->with('tutors', $tutors);
	}

    //
	public function create()
	{
		return view('admin.tutor.create');
	}

	public function store(Request $request)
	{
		$tutor = new Tutor($request->all());
		$tutor -> save();
		dd('Usuario creado');
	}	

}
