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

    //get the cost of the patron's stay
    public function cost()
    {
        $cin_date = new \DateTime($this->check_in);
        $cout_date = new \DateTime($this->check_out);
        $diff = $cin_date->diff($cout_date);

        //multiply p/pn by about of days spent. 
        return $this->room->price_per_night * (int)$diff->days;
    }
}
