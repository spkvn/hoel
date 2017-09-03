<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	//the room for this card
    public function room()
    {
    	return $this->has('App\Room');
    }

    //the user who has this card
    public function user()
    {
    	return $this->has(User::class,'user_id', 'id');
    }
}
