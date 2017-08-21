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
			$users = User::where($searchArray[0], 'like', '%'.$searchArray[1].'%')->get();
		}
		else
		{
			//search by 'name like $searchString'
			$users = User::where('name', 'like', '%'.$searchString.'%')->get();
		}

		return $users;
	}
}