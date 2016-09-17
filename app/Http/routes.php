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
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::group(['prefix'=>'materias'], function(){
	Route::resource('materias','MateriasController');
});

Route::get('home',  ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('materias_pivote/{id}',	['as'=>'materias_pivote','uses'=>'MateriasController@otra_funcion']);
Route::get('eliminar_materia/{id}',['as'=>'eliminar_materia','uses'=>'MateriasController@eliminar']);