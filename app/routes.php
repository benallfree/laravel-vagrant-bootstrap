<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as'=>'home', function()
{
	return View::make('hello');
}]);


if (Config::get('database.log', false))
{					 
		Event::listen('illuminate.query', function($query, $bindings, $time, $name)
		{
				$data = compact('bindings', 'time', 'name');

				// Format binding data for sql insertion
				foreach ($bindings as $i => $binding)
				{	 
						if ($binding instanceof \DateTime)
						{	 
								$bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
						}
						else if (is_string($binding))
						{	 
								$bindings[$i] = "'$binding'";
						}	 
				}			 

				// Insert bindings into query
				$query = str_replace(array('%', '?'), array('%%', '%s'), $query);
				$query = vsprintf($query, $bindings); 

				Log::info($query, $data);
		});
}
//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', ['as'=>'users.login','uses'=>'UsersController@login']);
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', ['as'=>'users.logout', 'uses'=>'UsersController@logout']);
