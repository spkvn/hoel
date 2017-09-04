<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	//the room for this card
    public function room()
    {
    	return $this->hasOne(Room::class,'id', 'access');
    }

    //the user who has this card
    public function user()
    {
    	return $this->hasOne(User::class,'id', 'user_id');
    }

    protected $fillable = ['access', 'user_id'];
}
