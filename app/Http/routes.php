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
    /*Route::get('/', function () {
        return view('dashboard');
    });*/
    Route::get('/', 'DashboardController@index');
    Route::get('schedule/medium', 'DashboardController@getMediumJson');
    Route::get('schedule/events', 'DashboardController@getEventsJson');
    Route::get('schedule', 'DashboardController@schedule');

    Route::resource('medium', 'MediumController');
    Route::resource('clients', 'ClientsController');
    Route::resource('users', 'UsersController');
    //Route::resource('medium', ['middleware' => 'auth', 'uses' => 'MediumController']);
    Route::resource('medium.issues', 'IssuesController');
    Route::resource('medium.issues.formats', 'FormatsController');
    Route::resource('types', 'MediumTypesController');
    Route::resource('inserate', 'InserateController');
    Route::get('printInvoice/{id}', 'InserateController@printInvoice');

    /**
     * Replication Routes
     */
    Route::get('replicate/issue/{id}', 'IssuesController@replicate');

    /**
     * Ajax Routes
     */
    Route::get('issue/{id}', 'IssuesController@listFormats');
    Route::get('issuedetails/{id}', 'IssuesController@showDetails');
    Route::get('inserat/{id}', 'InserateController@calculateTotals');
    Route::get('client/{id}', 'ClientsController@showDetails');

    /**
     * Autocompletes
     */
    Route::any('mediumAutoComplete', function () {
        $term = strtolower(Request::get('term'));
        $return_array = array();
        $data = DB::table("medium")
            ->join('issues', 'medium.id', '=', 'issues.medium_id')
            ->select('issues.id', 'medium.title', 'issues.name')
            ->where('title', 'LIKE', '%'.$term.'%')
            ->whereNull('issues.deleted_at')
            ->get();
        foreach ($data as $v) {
            $return_array[] = array('id' => $v->id, 'label' => $v->title.' - '.$v->name);
        }
        return Response::json($return_array);
     });

    Route::any('clientAutoComplete', function () {
        $term = strtolower(Request::get('term'));
        $return_array = array();
        $data = DB::table("clients")
            ->distinct()
            ->select('id', 'firma')
            ->where('firma', 'LIKE', '%'.$term.'%')
            ->whereNull('deleted_at')
            ->groupBy('firma')
            ->take(10)
            ->get();
        foreach ($data as $v) {
            $return_array[] = array('id' => $v->id, 'label' => $v->firma);
        }
        return Response::json($return_array);
    });

    Route::any('userAutoComplete', function () {
        $term = strtolower(Request::get('term'));
        $return_array = array();
        $data = DB::table("users")
            ->distinct()
            ->select('id', 'name', 'last_name')
            ->where('last_name', 'LIKE', '%'.$term.'%')
            ->orWhere('name', 'LIKE', '%'.$term.'%')
            ->whereNull('deleted_at')
            ->groupBy('last_name')
            ->take(10)
            ->get();
        foreach ($data as $v) {
            $return_array[] = array('id' => $v->id, 'label' => $v->name.' '.$v->last_name);
        }
        return Response::json($return_array);
    });

 	/**
 	 * Logs Route
 	 */
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

});
