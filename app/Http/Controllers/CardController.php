<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Card;

class CardController extends Controller
{
    public function create()
    {
    	return view('admin.create.card');
    }

    public function store()
    {
    	$this->validate(request(), [
            'room_number' => 'required|numeric',
            'email' => 'required|email'
    	]);

    	$user = User::where('email', '=', request('email'))
    				->where('category' , '=', 'Patron')
    				->first();
	
    	$room = Room::where('room_number','=', request('room_number'))
    				->first();

		$card = Card::create([
    		'access' => $room->id,
    		'user_id' => $user->id
    	]);

    	return redirect('admin/cards');
    }

    public function edit(Card $card)
    {
    	return view('admin.edit.card',compact('card'));
    }

    public function update(Card $card)
    {
    	$this->validate(request(), [
            'room_number' => 'required|numeric',
            'email' => 'required|email'
    	]);
    	$user = User::where('email', '=', request('email'))
    				->where('category' , '=', 'Patron')
    				->first();
	
    	$room = Room::where('room_number','=', request('room_number'))
    				->first();

		$card->user_id = $user->id;
		$card->access  = $room->id;

		$card->save();

		return redirect('/admin/cards/');
    }

    public function destroy(Card $card)
    {
    	$card->delete();

    	return redirect('admin/cards');
    }

}