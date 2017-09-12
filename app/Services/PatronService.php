<?php 
namespace App\Service;

use App\Booking;
use App\Room;
use App\User;
use Carbon\Carbon;

/**
 * Biz logic functions for users
 */
class PatronService
{
	public static function GetCurrentBooking(User $user)
	{
		$currentBooking = $user->bookings->where('check_in', '<', date('d/m/Y'))
										 ->where('check_out', '>' date('d/m/Y'))
										 ->first();

		return $currentBooking;
	}

	public static function GetFutureBookings(User $user)
	{
		$futureBookings = $user->bookings->where('check_in', '>', date('d/m/Y'))
										 ->get();
		return $futureBookings;
	}

}