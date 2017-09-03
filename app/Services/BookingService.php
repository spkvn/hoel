<?php
namespace App\Services;

use App\Booking;
use App\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
/**
* Business logic functions for Bookings
*/
class BookingService
{
	//Check room Available.
	public static function CheckAvailable(Room $room, $checkin, $checkout)
	{
		$bookingsCIInvalid = $room->bookings
					->where('check_in', '<', $checkin)
					->where('check_out','>', $checkin);

		$bookingsCOInvalid = $room->bookings
					->where('check_in', '>', $checkout)
					->where('check_out','<', $checkout);

		if(count($bookingsCIInvalid) == 0
		   && count($bookingsCOInvalid) == 0)
		{
			return true;
		}
		return false;
	}

	public static function SimpleFindBooking($room_id, $user_id, $check_in)
	{
		$booking = Booking::where('room_id', '=', $room_id)
					->where('user_id', '=', $user_id)
					->where('check_in', '=', $check_in)
					->first();
		return $booking;
	}

	//need to do raw because eloquent can't quite handle composite keys.
	public static function Delete($room_id, $user_id, $check_in)
	{
		$success = DB::table('bookings')
					->where('user_id', '=', $user_id)
					->where('room_id', '=', $room_id)
					->where('check_in','=', $check_in)
					->delete();
		return $success;
	}
}