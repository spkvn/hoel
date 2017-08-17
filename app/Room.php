<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
   	/**
      * The bookings of this room
      */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    protected $fillable = ['room_number', 'beds', 'max_capacity', 'price_per_night'];
}
