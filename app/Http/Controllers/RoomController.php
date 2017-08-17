<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room as Room;

class RoomController extends Controller
{
	public function update(Room $room)
    {
    	$this->validate(request(),[
    		'room_number' => 'numeric',
    		'beds' => 'numeric',
    		'max_capacity' => 'numeric',
    		'price_per_night' => 'numeric',
    	]);

    	$room->room_number = request('room_number');
    	$room->beds = request('bed');
    	$room->max_capacity = request('max_capacity');
    	$room->price_per_night = request('price_per_night');

    	$room->save();

    	$rooms = Room::all();

		return redirect('admin.rooms',compact('rooms'));
    }

    public function destroy(Room $room)
    {
    	$room->delete();
    	$rooms = Room::all();
    	return view('admin.rooms',compact('rooms'));
    }

    public function edit(Room $room)
    {
    	return view('admin.edit.room',compact('room'));
    }

    public function create()
    {
    	return view('admin.create.room');
    }

    public function store()
    {
    	$this->validate(request(),[
    		'room_number' => 'required|numeric',
    		'beds' => 'required|numeric',
    		'max_capacity' => 'required|numeric',
    		'price_per_night' => 'required|numeric',
    	]);

    	Room::create([
			'room_number'  => request('room_number'),
			'beds' => request('beds'),
			'max_capacity' => request('max_capacity'),
			'price_per_night' => request('price_per_night')
		]);

		return redirect('/admin/rooms');
    }
}
