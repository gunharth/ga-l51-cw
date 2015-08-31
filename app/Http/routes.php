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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
	    return view('dashboard');
	});

	//Route::get('medium/{slug}', 'MediumController@show');
	
	Route::resource('medium', 'MediumController');
	//Route::resource('medium', ['middleware' => 'auth', 'uses' => 'MediumController']);

	Route::resource('medium.issues', 'IssuesController');
	Route::resource('medium.issues.formats', 'FormatsController');
	Route::resource('types', 'MediumTypesController');
	
});
