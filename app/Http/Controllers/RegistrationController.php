<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registrations.create');
    }

    public function store()
	{
		//validate
		$this->validate(request(),[
				'name' => 'required',
				'email' => 'required|email',
				'password' => 'required|min:6|confirmed'
			]);

		//crypt the pwd.
		$passwordCrypt = bcrypt(request('password'));

		$user = User::create([
				'name'  => request('name'),
				'email' => request('email'),
				'password' => $passwordCrypt,
				'category' => request('category')
			]);

		auth()->login($user);

		return redirect('/tasks');
	}
}
