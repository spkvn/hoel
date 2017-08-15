<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User as User;

class AdminController extends Controller
{
    public function users()
    {
    	$users = User::all();

    	return view('admin.users')->with('users', $users);
    }
}
