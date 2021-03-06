<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use App\User;

class UserController extends Controller
{
	public function __construct()
	{
		$this->SearchService = new SearchService();
	}

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

    public function search()
    {
    	$users = $this->SearchService->UserSearch(request('search_term'));
    	
    	if($users->isEmpty())
		{
			return view('admin.users',['users' => null])->withErrors(['no_results' => 'We did not find any users with the search term: '.request('search_term').', please try again']);
		}
		else
		{
			return view('admin.users', compact('users'));
		}
    }

    public function destroy(User $user)
    {
    	$user->delete();
    	$users = User::all();
    	return view('admin.users',compact('users'));
    }

    public function edit(User $user)
    {
    	return view('admin.edit.user',compact('user'));
    }

    public function create()
    {
    	return view('admin.create.user');
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

		return redirect('/admin/users');
    }
}
