<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

	public function DecideWelcome()
	{
		switch(auth()->user()->category)
		{
			case 'Administrator':
				$this->AdministratorWelcome();
				break;

			case 'Reception':
				$this->ReceptionWelcome();
				break;

			case 'Housekeeper':
				$this->HousekeeperWelcome();
				break;

			case 'Patron':
				$this->PatronWelcome();
				break;

			default:
				return view('permission.no');
		}
	}
    public function AdministratorWelcome()
    {
    	echo "Welcome Administrator";
    }

    public function ReceptionWelcome()
    {
    	echo "Welcome Receptionist";
    }

    public function HousekeepingWelcome()
    {
    	echo "Welcome Housekeeper";
    }

    public function PatronWelcome()
    {
    	echo "Welcome Patron";
    }
}
