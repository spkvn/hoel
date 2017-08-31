<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Booking;

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
    		'check_in' => 'required|date_format:d/m/Y|after:today',
    		'check_out' => 'required|date_format:d/m/Y|after:check_in'
    	]);

    	$user = User::where('email', '=', request('email'))
    					->where('category', '=', 'Patron')
    					->first();

    	$room = Room::where('room_number','=',request('room_number'))
    					->first();

    	//ToDo: check room not currently booked. 

    	Booking::create([
    		'room_id' => $room->id,
    		'user_id' => $user->id,
    		'check_in' => new \DateTime(request('check_in')),
    		'check_out' => new \DateTime(request('check_out'))
    	]);

    	return redirect('/admin/bookings');
    }
}
