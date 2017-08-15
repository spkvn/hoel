<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User as User;

class AdminController extends Controller
{
    public function users()
    {
    	$users = User::all();

    	return view('admin.users',compact('users'));
    }

    public function editUser(User $user)
    {
    	return view('admin.edit.user',compact('user'));
    }
}
