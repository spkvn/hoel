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
	Route::get('/dashboard', 'DashboardController@DecideWelcome')->name('dashboard');
	
	Route::prefix('admin')->group(function () 
	{
        //Matches The "/admin/user[s]?" URL
        Route::get('users', 'AdminController@users');       
        Route::get('user/create', 'UserController@create'); 
        Route::get('user/{user}', 'UserController@edit');   
        Route::post('user/search', 'UserController@search');
        Route::post('user/store', 'UserController@store');  
        Route::post('user/{user}', 'UserController@update');    
        Route::delete('/user/{user}','UserController@destroy');

        //Matches the "/admin/room[s]?" URL
        Route::get('/rooms', 'AdminController@rooms');      
        Route::get('/room/create', 'RoomController@create');
        Route::get('/room/{room}', 'RoomController@edit');  
        Route::post('/room/search','RoomController@search');
        Route::post('/room/store', 'RoomController@store'); 
        Route::post('/room/{room}','RoomController@update');    
        Route::delete('/room/{room}','RoomController@destroy');

        //Matches "/admin/room/{room}/image[s]?"
        Route::get('room/{room}/image', 'RoomImagesController@index')
             ->name('admin.roomimages');
        Route::get('room/{room}/image/create','RoomImagesController@create');
        Route::post('room/{room}/image','RoomImagesController@store');
        Route::delete('/room/{room}/image/{image}', 'RoomImagesController@destroy');

        //Matches the "/admin/card[s]?" URL
        Route::get('/cards','AdminController@cards');
        Route::get('/card/create','CardController@create');
        Route::get('/card/{card}','CardController@edit');
        Route::post('/card/store','CardController@store');
        Route::post('/card/{card}','CardController@update');
        Route::delete('/card/{card}','CardController@destroy');

        //Matches the "/admin/booking[s]?" URL 
        Route::get('/bookings','AdminController@bookings');
        Route::get('/booking/create/','BookingController@create'); 
        Route::get('/booking/{room}/{user}/{check_in}', 'BookingController@edit');
        Route::post('/booking/search','BookingController@search');
        Route::post('/booking/store', 'BookingController@store');
        Route::post('/booking/{room}/{user}/{check_in}', 'BookingController@update'); 
        Route::delete('/booking/{room}/{user}/{check_in}','BookingController@destroy'); 
	});

    Route::prefix('patron')->group(function ()
    {
        Route::get('booking/past', 'BookingController@PastBookings');
        Route::get('booking/create', 'BookingController@PatronCreate');
        Route::get('booking/{room}/{user}/{check_in}', 'BookingController@PatronEdit');
        Route::post('booking/{room}/{user}/{check_in}', 'BookingController@PatronUpdate');
        Route::post('booking/store', 'BookingController@PatronStore');
    });
});
