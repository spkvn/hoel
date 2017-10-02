<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	public function __construct()
	{
		//allow only guests to access logging
		$this->middleware('guest',['except' => 'destroy']);
	}

	public function create()
	{
		return view("sessions.create");
	}

    public function store()
    {
    	if(!auth()->attempt(request(['email','password'])))
    	{
    		return back()->withErrors(['message' => 'Check Credentials']);
    	}

        //add a way to find category and redirect based on that
    	return redirect('/dashboard');
    }

    public function destroy()
    {
    	auth()->logout();
    	return redirect('/');
    }
}
