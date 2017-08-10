<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','SessionController@create');
Route::get('/home', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');

//registration routes
Route::get('/register','RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

//authenticated users only
Route::group(['middleware' => 'auth'], function ()
{
	Route::get('/dashboard', 'DashboardController@DecideWelcome')->name('admin.dashboard');
});
