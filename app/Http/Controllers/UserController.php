<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function update(User $user)
    {
    	$this->validate(request(),[
				'email' => 'email|nullable',
				'password' => 'min:6|confirmed|nullable'
			]);

		//crypt the pwd.
		if(request('password') != null)
		{
			$user->password = bcrypt(request('password'));
		}
		if(request('name') != null)
		{
			$user->name = request('name');			
		}
		if(request('email') != null)
		{
			$user->email = request('email');		
		}
		if(request('category') != null)
		{
			$user->category = request('category');		
		}

		$user->save();

		$users = User::all();

		return view('admin.users', compact('users'));
    }
}
