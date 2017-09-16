<?php 
namespace App\Services;

use App\Booking;
use Carbon\Carbon;

class DisplayService
{
	public static function FormattedDateString($date)
	{
		return Carbon::createFromTimeStamp(strtotime($date))
					 ->toFormattedDateString();
	}
}