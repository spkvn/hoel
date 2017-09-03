<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Booking;
use App\Services\BookingService;
use App\Http\Requests\BookingRequest;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create()
    {
    	return view('admin.create.booking');
    }

    public function store(BookingRequest $bookingReq)
    {
    	$user = User::where('email', '=', request('email'))
    					->where('category', '=', 'Patron')
    					->first();

    	$room = Room::where('room_number','=',request('room_number'))
    					->first();

    	/*try
	    {
	    	$checkin  = new \DateTime(request('check_in'));
	    	$checkout = new \DateTime(request('check_out'));
    	}
    	catch(Exception $e)
    	{
    		return Redirect::back()->withErrors('Could not parse date inputs!');
    		//write $e to debugbar
    	}*/


		$CI = Carbon::createFromFormat('d/m/Y|',request('check_in'));
    	$CO = Carbon::createFromFormat('d/m/Y|',request('check_out'));
    	//ToDo: check room not currently booked. 
    	if(BookingService::CheckAvailable($room, $CI,$CO))
    	{

	    	Booking::create([
	    		'room_id' => $room->id,
	    		'user_id' => $user->id,
	    		'check_in' => $CI->toDateTimeString(),
	    		'check_out' => $CO->toDateTimeString()
	    	]);
	    	return redirect('/admin/bookings');
    	}			
    	else
    	{
    		return redirect('/admin/booking/create')->withErrors('Room unavailable at '
    			.$CI->toDateString());
    	}	
    }
}
