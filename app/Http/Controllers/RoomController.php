<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Services\ImageService;
use App\RoomImage as RoomImage;
use App\Room as Room;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->SearchService = new SearchService();
    }

    public function search()
    {
        $rooms = $this->SearchService->RoomSearch(request('search_term'));
        
        if($rooms->isEmpty())
        {
            return view('admin.rooms',['users' => null])->withErrors(['no_results' => 'We did not find any rooms with the search term: '.request('search_term').', please try again']);
        }
        else
        {
            return view('admin.rooms', compact('rooms'));
        }
    }

	public function update(Room $room)
    {
    	$this->validate(request(),[
    		'room_number' => 'numeric|nullable',
    		'beds' => 'numeric|nullable',
    		'max_capacity' => 'numeric|nullable',
    		'price_per_night' => 'numeric|nullable',
    	]);

        if(request('room_number') != null)
        {
        	$room->room_number = request('room_number');
        }
        if(request('beds') != null)
        {
        	$room->beds = request('beds');
        }
        if(request('max_capacity') != null)
        {
        	$room->max_capacity = request('max_capacity');
        }
        if(request('price_per_night') != null)
        {
        	$room->price_per_night = request('price_per_night');
        }

    	$room->save();

    	$rooms = Room::all();

		return view('admin.rooms',compact('rooms'));
    }

    public function destroy(Room $room)
    {
        $roomImages = $room->images();
        foreach($roomImages as $roomImage)
        {
            RoomImage::delete($roomImage);
        }
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
