<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User as User;
use \App\Room as Room;

class AdminController extends Controller
{
    public function users()
    {
    	$users = User::all();
    	return view('admin.users',compact('users'));
    }

    public function rooms()
    {
    	$rooms = Room::all();
    	return view('admin.rooms',compact('rooms'));
    }
}
