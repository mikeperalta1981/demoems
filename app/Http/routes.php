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



/*Route::get('login', 'LoginController@getDashboard');

Route::get('dashboard', 'DashboardController@getDashboard');

Route::get('main', function(){
	return view('main');
});*/




Route::auth();
Route::get('/', 'DashboardController@getDashboard');
Route::get('dashboard', 'DashboardController@getDashboard');
Route::resource('employee/getList', 'EmployeeController@getList');
Route::resource('employee/showProfile', 'EmployeeController@showProfile');
Route::resource('employee/postPicture', 'EmployeeController@postPicture');
Route::resource('employee', 'EmployeeController');

/*Route::get('/home', 'HomeController@index');*/
