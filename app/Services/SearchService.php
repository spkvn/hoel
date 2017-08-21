<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\User;

class SearchService 
{
	public function UserSearch($searchString)
	{
		$searchArray = explode(':', $searchString);

		if(count($searchArray) > 1)
		{
			//search by $searchArray[0] 'like' $searcharray[1]
			$users = User::where($searchArray[0], 'like', $searchArray[1])->get();
		}
		else
		{
			//search by 'name like $searchString'
			$users = User::where('name', 'like', $searchString)->get();
		}

		if( $users.isEmpty())
		{
			return view('admin.users')->withErrors(['no_results' => 'We did not find any users with the search term: '.$searchString.', please try again']);
		}
		else
		{
			return view('admin.users', compact('users'));
		}
	}
}