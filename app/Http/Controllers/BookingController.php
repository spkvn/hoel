<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
    	return view('admin.create.booking');
    }

    public function store()
    {
    	$this->validate(request(),[
    		'room_number' => 'required|numeric',
    		'email' => 'required|email',
    		'check_in' => 'date|required|date_format:d/m/Y|after:today',
    		'check_out' => 'date|required|date_format:d/m/Y|after:check_in'
    	]);

    	$user = App\User::where('email', '=', request('email'))
    					->where('category', '=', 'Patron')
    					->get();

    	$room = App\Room::where('room_number','=',request('room_number'))
    					->get();

    	Booking::create([
    		'room_id' => $room->id,
    		'user_id' => $user->id,
    		'check_in' => request('check_in'),
    		'check_out' => request('check_out')
    	]);

    	return redirect('/admin/bookings');
    }
}
