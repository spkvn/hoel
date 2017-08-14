<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
   	/**
      * The users that have booked this room
      */
    public function rooms()
    {
        return $this->belongsToMany('App\Booking','rooms');
    }
}
