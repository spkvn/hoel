<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Booking;
use App\Services\BookingService;
use App\Services\SearchService;
use App\Http\Requests\BookingRequest;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->SearchService = new SearchService();
    }

    /*TODO Fix search for bookings. Composite keys are shitty
    public function search()
    {
        $bookings = $this->SearchService->BookingSearch(request('search_term'));
        
        if($bookings->isEmpty())
        {
            return view('admin.bookings',['users' => null])->withErrors(['no_results' => 'We did not find any bookings with the search term: '.request('search_term').', please try again']);
        }
        else
        {
            return view('admin.rooms', compact('bookings'));
        }
    }*/

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
    		return redirect('admin.booking.create')->withErrors('Room unavailable at '
    			.$CI->toDateString());
    	}	
    }

    public function edit($room_id,$user_id,$check_in)
    {
        $booking = BookingService::SimpleFindBooking($room_id,$user_id,$check_in);

        return view('admin.edit.booking', compact('booking'));
    }

    public function destroy($room_id, $user_id, $check_in)
    {
        $booking = BookingService::Delete($room_id,$user_id, $check_in);
        
        $bookings = Booking::all(); 
        return view('admin.bookings', compact('bookings'));
    }

    public function update(BookingRequest $bookingReq)
    {
        /*New Vars*/
        $user = User::where('email', '=', request('email'))
                        ->where('category', '=', 'Patron')
                        ->first();
        $room = Room::where('room_number','=',request('room_number'))
                        ->first();
        $CI = Carbon::createFromFormat('Y-m-d',request('check_in'));
        $CO = Carbon::createFromFormat('Y-m-d',request('check_out'));

        /*Old Vars*/
        $origRoom_id = request('origRoom_id');
        $origUser_id = request('origUser_id');
        $origCheck_in = request('origCheck_in');

        $booking = BookingService::SimpleFindBooking($origRoom_id,$origUser_id,$origCheck_in);

        if(BookingService::CheckAvailable($room, $CI,$CO))
        {
            //can't '$booking->save' due to composite keys
            //so delete and re-create instead.
            BookingService::delete($origRoom_id,$origUser_id,$origCheck_in);

            Booking::create([
                'user_id' => $user->id,
                'room_id' => $room->id,
                'check_in'=> $CI->toDateTimeString(),
                'check_out'=> $CO->toDateTimeString(),
            ]);

            return redirect('admin/bookings');
        }
        else
        {
            return redirect('admin/booking/'.$origRoom_id.'/'.$origUser_id.'/'.$origCheck_in)
                   ->withErrors('Room unavailable at '.$CI->toDateString());
        }
    }

    public function PastBookings()
    {
        if(auth()->user()->category != 'Patron')
        {
            //you're not a patron, you can't book sir!
            return redirect()->route('dashboard');
        }
        else
        {
            $pastBookings = auth()->user()
                                  ->bookings()
                                  ->where('check_out', '<' , date('Y/m/d'));
            dd($pastBookings->get());
            return view('patron.booking.past')->with('pastBookings',$pastBookings->get());
        }
    }
}
