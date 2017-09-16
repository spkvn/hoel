<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
	protected $fillable = ['room_id','path','alt'];
    public function room()
    {
    	return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
