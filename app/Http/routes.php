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


/*Route::group(['prefix' => 'mat'], function(){
    
    Route::get('Pnotas/{id}/destroy',[
        'uses' => 'PorcentajeNotasController@destroy', //uses va por default para que reconosca la ruta
        'as' => 'mat.Pnotas.destroy'
        ]);

});*/



/*RUTAS RODRIGO*/
Route::get('elejirCarrera', 'PorcentajeNotasController@create');
Route::post('guardar', 'PorcentajeNotasController@show');


Route::post('guardarPorcentajes',[
        'uses' => 'PorcentajeNotasController@store', 
        'as' => 'Pnotas.create2'
        ]);

Route::get('verPorcentajes',[
        'uses' => 'PorcentajeNotasController@index',
        'as' => 'Pnotas.index'
        ]);

Route::get('verPorcentajes/{id}/destroy',[
        'uses' => 'PorcentajeNotasController@destroy',
        'as' => 'Pnotas.destroy'
        ]);


Route::get('editar/{pnotas}/edit',[
        'uses' => 'PorcentajeNotasController@edit', 
        'as' => 'Pnotas.edit'
        ]);

Route::put('cambiar/{Pnotas}',[
        'uses' => 'PorcentajeNotasController@update', 
        'as' => 'Pnotas.update'
        ]);

Route::get('mostrarPorcenjate/{pnotas}/ver', [
    'uses' => 'PorcentajeNotasController@verPorcentajes', 
    'as'    => 'Pnotas.ver'
    ]);



/*OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO*/

Route::get('ingresarNotas/seleccionar', [
    'uses' => 'IngresarNotasController@create',
    'as' => 'notasAlumnos.create'
    ]);

Route::post('guardarNota', 'IngresarNotasController@show');

Route::post('ingresarNotas/crearNotas',[
        'uses' => 'IngresarNotasController@store', 
        'as' => 'notasAlumnos.create2'
        ]);

/*OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO*/

Route::get('crearCiclo', 'CicloController@create');

Route::post('guardarCiclo',[
        'uses' => 'CicloController@store', 
        'as' => 'ciclo.create'
        ]);

Route::get('verCiclos',[
        'uses' => 'CicloController@index',
        'as' => 'ciclo.index'
        ]);


Route::get('update/{ciclo}/edit',[
        'uses' => 'CicloController@edit', 
        'as' => 'ciclo.edit'
        ]);

Route::put('modificar/{ciclo}',[
        'uses' => 'CicloController@update', 
        'as' => 'ciclo.update'
        ]);

Route::get('verCiclos/{id}/destroy',[
        'uses' => 'CicloController@destroy',
        'as' => 'ciclo.destroy'
        ]);


/*RUTAS RODRIGO*/

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');



//rutas Elias
            //--Materias

Route::resource('materias','MateriasController');
Route::get('materias/filtrar/{id}', ['as'=>'materias.filtrar','uses'=>'MateriasController@filtrarMaterias']);
Route::get('materias/destroy/{id}',['as'=>'materias.destroy','uses'=>'MateriasController@eliminar']);


            //--Carreras
Route::resource('carreras','CarrerasController');
Route::get('carreras/destroy/{id}',['as'=>'carreras.destroy','uses'=>'CarrerasController@destroy']);

            //--Grupos
Route::resource('grupos','GruposController');
Route::get('grupos/destroy/{id}',['as'=>'grupos.destroy','uses'=>'GruposController@destroy']);

			//Reportes
//Route::resource('reportes','ReportesController');
Route::get('reportes/ListadoEstudiantes',['as'=>'reportes.listado_estudiantes','uses'=>'ReportesController@CrearListadoEstudiantes']);
Route::get('reportes/GenerarPDFListadoEstudiantes',['as'=>'reportes.pdf_listado_estudiantes','uses'=>'ReportesController@GenerarPDFListadoEstudiantes']);



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

//EstadoEstudiante
//Route::resource('estado','EstudianteController');
Route::get('estado/create','EstudianteController@create');
Route::post('estado/show','EstudianteController@show');
Route::get('estado/create2','EstudianteController@create2');
Route::post('estado/show2','EstudianteController@show2');

Route::post('estado/guardarAsesoria',[
        'uses' => 'EstudianteController@guardarTutoria', 
        'as' => 'estado.estado_estudiante'
        ]);


