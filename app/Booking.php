<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	//the room for this booking
    public function room()
    {
    	return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    //the user who created this booking
    public function user()
    {
    	return $this->belongsTo(User::class,'user_id', 'id');
    }
}
