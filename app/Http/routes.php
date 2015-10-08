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
	Route::resource('clients', 'ClientsController');
	Route::resource('users', 'UsersController');
	//Route::resource('medium', ['middleware' => 'auth', 'uses' => 'MediumController']);
	Route::resource('medium.issues', 'IssuesController');
	Route::resource('medium.issues.formats', 'FormatsController');
	Route::resource('types', 'MediumTypesController');
	Route::resource('inserate', 'InserateController');

	//ajax calls
	Route::get('issue/{id}', 'IssuesController@listFormats');
	Route::get('inserat/{id}', 'InserateController@calculateTotals');

	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
	
Route::any('getdata', function(){
 $term = strtolower(Request::get('term'));
 //dd($term);
 
 // 4: check if any matches found in the database table 
 $data = DB::table("users")->distinct()->select('name')->where('name', 'LIKE', $term.'%')->groupBy('name')->take(10)->get();
 foreach ($data as $v) {
 $return_array[] = array('value' => $v->name);
  }
  // if matches found it first create the array of the result and then convert it to json format so that 
  // it can be processed in the autocomplete script
 return Response::json($return_array);
 });
	
});
