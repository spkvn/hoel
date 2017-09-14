<?php 
namespace App\Services;

use App\Booking;
use Carbon\Carbon;

/**
 * Biz logic functions for users
 */
class DisplayService
{
	public static function FormattedDateString($date)
	{
		return Carbon::createFromTimeStamp(strtotime($date))
					 ->toFormattedDateString();
	}
}