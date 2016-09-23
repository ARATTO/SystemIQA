<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('home.home');
});

Route::get('login', function () {
    return view('login.login');
});

Route::get('home', function () {
    return view('home.home');
});*/



Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');



//rutas Elias
			//--Materias

Route::resource('materias','MateriasController');
Route::get('materias/filtrar/{id}',	['as'=>'materias.filtrar','uses'=>'MateriasController@filtrarMaterias']);
Route::get('materias/destroy/{id}',['as'=>'materias.destroy','uses'=>'MateriasController@eliminar']);


			//--Carreras
Route::resource('carreras','CarrerasController');
Route::get('carreras/destroy/{id}',['as'=>'carreras.destroy','uses'=>'CarrerasController@destroy']);

			//--Grupos
Route::resource('grupos','GruposController');
Route::get('grupos/destroy/{id}',['as'=>'grupos.destroy','uses'=>'GruposController@destroy']);
//FIN rutas Elias


//LOBOS
Route::post('mostrarForm', 'FormulariosController@show');
Route::get('cargar_usuarios', 'FormulariosController@form_cargar_datos_usuarios');
Route::get('create', 'FormulariosController@create');
Route::post('cargar_datos_usuarios', 'FormulariosController@cargar_datos_usuarios');
// FIN LOBOS


//MOTTO
Route::resource('users','UserController');
Route::get('users/create','UserController@create');
Route::get('users/{id}/destroy', [
  'as' => 'users.destroy',
  'uses' => 'UserController@destroy'
]);
//FIN MOTTO

//Rutas Alam Lopez
Route::resource('tutor','TutoresController');

Route::get('tutor/{id}/destroy',[
    'uses' => 'TutoresController@destroy',
    'as' => 'tutor.destroy'
]);
//Fin Rutas Alam Lopez
/*
Route::get('users', [
  'as' => 'users/index',
  'uses' => 'UserController@index'
]);

Route::group(['prefix' => 'admin'], function(){

	Route::resource('users','UsersController');

});
*/

