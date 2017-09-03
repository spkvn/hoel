<?php
namespace App\Services;

use App\Booking;
use App\Room;
/**
* Business logic functions for Bookings
*/
class BookingService
{
	//Check room Available.
	public static function CheckAvailable(Room $room, $checkin, $checkout)
	{
		$bookingsCIInvalid = $room->bookings
					->where('check_in', '<=', $checkin)
					->where('check_out','>=', $checkin);

		$bookingsCOInvalid = $room->bookings
					->where('check_in', '>=', $checkout)
					->where('check_out','<=', $checkout);

		if(count($bookingsCIInvalid) == 0
		   && count($bookingsCOInvalid) == 0)
		{
			return true;
		}
		return false;
	}
}