<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Booking;
use App\Room;
use App\Card;
use App\Services\PatronService;

class DashboardController extends Controller
{
	public function DecideWelcome()
	{
		switch(auth()->user()->category)
		{
			case 'Administrator':
				return DashboardController::AdministratorWelcome();
				break;

			case 'Reception':
				return DashboardController::ReceptionWelcome();
				break;

			case 'Housekeeping':
				return DashboardController::HousekeepingWelcome();
				break;

			case 'Patron':
				return DashboardController::PatronWelcome();
				break;

			default:
				return view('permission.no');
		}
	}
    public function AdministratorWelcome()
    {
    	return view('dash.admin');
    }

    public function ReceptionWelcome()
    {
    	return view('dash.reception');
    }

    public function HousekeepingWelcome()
    {
    	return view('dash.housekeeping');
    }

    public function PatronWelcome()
    {
    	$user 	  = Auth::User();
    	$currentBooking = PatronService::GetCurrentBooking($user);
    	$futureBookings = PatronService::GetFutureBookings($user);
    	return view('dash.patron')
    		   ->with('currentBooking', $currentBooking)
    		   ->with('futureBookings', $futureBookings);
    }
}
