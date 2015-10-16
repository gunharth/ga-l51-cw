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
	Route::get('issuedetails/{id}', 'IssuesController@showDetails');
	Route::get('inserat/{id}', 'InserateController@calculateTotals');
	Route::get('client/{id}', 'ClientsController@showDetails');
	//Route::get('mediumAutoComplete', 'MediumController@listMediums');

	Route::any('mediumAutoComplete', function(){
		$term = strtolower(Request::get('term'));
		$return_array = array();
		//
		$data = DB::table("medium")->join('issues', 'medium.id', '=', 'issues.medium_id')->select('issues.id','medium.title','issues.name')->where('title', 'LIKE', '%'.$term.'%')->get();
			foreach ($data as $v) {
	 			$return_array[] = array('id' => $v->id, 'label' => $v->title.' - '.$v->name);
	  	}
	 return Response::json($return_array);
	 });

	Route::any('clientAutoComplete', function(){
		$term = strtolower(Request::get('term'));
		$return_array = array();
		$data = DB::table("clients")->distinct()->select('id','firma')->where('firma', 'LIKE', '%'.$term.'%')->groupBy('firma')->take(10)->get();
			foreach ($data as $v) {
	 			$return_array[] = array('id' => $v->id, 'label' => $v->firma);
	  	}
	  // if matches found it first create the array of the result and then convert it to json format so that 
	  // it can be processed in the autocomplete script
	 return Response::json($return_array);
	 });

	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

	
});
