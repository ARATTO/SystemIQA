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

//MOTTO
Route::resource('users','UserController');
Route::get('users/create','UserController@create');
Route::get('users/{id}/destroy', [
  'as' => 'users.destroy',
  'uses' => 'UserController@destroy'
]);
//FIN MOTTO
/*
Route::get('users', [
  'as' => 'users/index',
  'uses' => 'UserController@index'
]);

Route::group(['prefix' => 'admin'], function(){

	Route::resource('users','UsersController');

});
*/
