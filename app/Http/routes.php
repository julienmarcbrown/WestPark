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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


Route::get('/login', function()
{
	return View::make('auth.login');
});
Route::get('/about', function()
{
	return View::make('about');
});

Route::group(array('middleware' => 'auth'), function(){
	// your routes

	Route::get('members', 'MembersController@index');

	Route::resource('/products', 'ProductController');

});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
