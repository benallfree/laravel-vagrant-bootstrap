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


Route::filter('profile', function($route, $request)
{
  if(!$_ENV['ENABLE_USER_PROFILE']) return;
  if(!Auth::check()) return;
  if(Auth::user()->is_profile_complete()) return;
  return Redirect::action('users.profile')->with(['notice'=>'Please complete your profile.']);
});

Route::get('/', [
  'as'=>'home',
  'before'=>['profile'],
  function()
  {
  	return View::make('hello');
  }
]);


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
// Confide routes
Route::group(['prefix' => 'users'], function() {
  Route::group([
    'before'=>['auth'],
    ], function() {
    Route::get('profile', ['as'=>'users.profile','uses'=>'UsersController@profile']);
    Route::post('profile', 'UsersController@doProfile');
  });

  Route::get('create', 'UsersController@create');
  Route::post('/', 'UsersController@store');
  Route::get('login', ['as'=>'users.login','uses'=>'UsersController@login']);
  Route::post('login', 'UsersController@doLogin');
  Route::get('confirm/{code}', 'UsersController@confirm');
  Route::get('forgot_password', 'UsersController@forgotPassword');
  Route::post('forgot_password', 'UsersController@doForgotPassword');
  Route::get('reset_password/{token}', 'UsersController@resetPassword');
  Route::post('reset_password', 'UsersController@doResetPassword');
  Route::get('logout', ['as'=>'users.logout', 'uses'=>'UsersController@logout']);
});