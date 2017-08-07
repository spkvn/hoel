<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	public function __construct()
	{
		//allow only guests to access loging
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
    	return view(getUserView());
    }

    public function destroy()
    {
    	auth()->logout();
    	return redirect('/');
    }

    private function getUserView()
    {
    	$user = User::find(auth()->id());
    	dd($user);
    	switch ($user->category) 
    	{
    		case 'Administrator':
    			return 'admin.index';
    			break;

    		case 'Reception':
    			return 'recep.index';
    			break;

    		case 'Patron':
    			return 'patron.index';
    			break;

    		case 'Housekeeping':
    			return 'housekeep.index';
    			break;
    		
    		default:
    			return 'patron.index';
    			break;
    	}
    }
}
