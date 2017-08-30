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
	
	Route::prefix('admin')->group(function () 
	{
        //Matches The "/admin/user[s]?" URL
    	Route::get('users', 'AdminController@users');			//list users
    	Route::get('user/create', 'UserController@create');		//display user form for creation
        Route::get('user/{user}', 'UserController@edit');       //display user form
        Route::post('user/search', 'UserController@search');    //search for user based on property
    	Route::post('user/store', 'UserController@store'); 		//store the user in db.
    	Route::post('user/{user}', 'UserController@update');	//update user model
    	Route::delete('/user/{user}','UserController@destroy');	//destroy the user model

    	//Matches the "/admin/room[s]?" URL
    	Route::get('/rooms', 'AdminController@rooms');			//list rooms
    	Route::get('/room/create', 'RoomController@create');	//display room form for creation
    	Route::get('/room/{room}', 'RoomController@edit');		//display room form
        Route::post('/room/search','RoomController@search');    //search for room
    	Route::post('/room/store', 'RoomController@store');		//store room in db
    	Route::post('/room/{room}','RoomController@update');	//update room model
    	Route::delete('/room/{room}','RoomController@destroy');	//destroy room model

        //Matches the "/admin/booking[s]?" URL 
        Route::get('/bookings','AdminController@bookings');         //list bookings
        Route::get('/booking/create/','BookingController@create'); //display bookings form for creation
        Route::post('/booking/store', 'BookingController@store'); //create booking and store.


        
	});
});
