<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\User;
use App\Booking;
use App\Room;

class SearchService 
{
	public function UserSearch($searchString)
	{
		$searchArray = explode(':', $searchString);

		if(count($searchArray) > 1)
		{
			//search by $searchArray[0] 'like' $searcharray[1]
			$users = User::where($searchArray[0], 'like', '%'.$searchArray[1].'%')->get();
		}
		else
		{
			//search by 'name like $searchString'
			$users = User::where('name', 'like', '%'.$searchString.'%')->get();
		}

		return $users;
	}

	public function RoomSearch($searchString)
	{
		$searchArray = explode(':', $searchString);

		if(count($searchArray) > 1)
		{
			//search by $searchArray[0] 'like' $searcharray[1]
			$rooms = Room::where($searchArray[0], 'like', '%'.$searchArray[1].'%')->get();
		}
		else
		{
			//search by 'name like $searchString'
			$rooms = Room::where('room_number', 'like', '%'.$searchString.'%')->get();
		}

		return $rooms;
	}

	/*Currently Broken*/
	public function BookingSearch($searchString)
	{
		$searchArray = explode(':',$searchString);

		if(count($searchArray) > 1)
		{
			$bookings = Booking::where($searchArray[0],'like','%'.$searchArray[1].'%')->get();
		}
		else
		{
			$user = User::where('name', 'like', '%'.$searchString.'%')->get();
			$bookings = Booking::where('user_id', '=', $user->id)->get();
		}

		return $bookings;
	}
}