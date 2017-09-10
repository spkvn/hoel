<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User as User;
use \App\Room as Room;
use \App\Booking as Booking;
use \App\Card as Card;

class AdminController extends Controller
{
    //return admin users view
    public function users()
    {
    	$users = User::all();
    	return view('admin.users',compact('users'));
    }

    //return admin rooms view
    public function rooms()
    {
    	$rooms = Room::all();
    	return view('admin.rooms',compact('rooms'));
    }

    //return admin bookings view
    public function bookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings',compact('bookings'));
    }

    //return admin cards view
    public function cards()
    {
        $cards = Card::all();
        return view('admin.cards',compact('cards'));
    }
}
