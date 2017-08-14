<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function room()
    {
    	return $this->hasOne('App\Room', 'rooms');
    }

    public function user()
    {
    	return $this->hasOne('App\Room', 'users');
    }
}
