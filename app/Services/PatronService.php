<?php 
namespace App\Services;

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
		return $user->bookings->where('check_in', '<=', date('Y/m/d'))
							  ->where('check_out', '>=', date('Y/m/d'))
							  ->first();
	}

	public static function GetFutureBookings(User $user)
	{
		return 	$user->bookings->where('check_in', '>', date('Y/m/d'))
					 		   ->all();
	}

	public static function GetPastBookings(User $user)
	{
		return $user->bookings->where('check_out', '<', date('Y/m/d'))->all();
	}

}