<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Room;

class RoomTest extends TestCase
{
	private $room; 
	public function __construct()
	{
		$this->room = new Room();
		$this->room->id = "999";
		$this->room->room_number = "9999";
		$this->room->beds = 1;
		$this->room->max_capacity = 2;
		$this->room->price_per_night = 400;
	}

    public function testHasRoomNumber()
    {
    	$this->assertEquals("9999",$this->room->room_number);
    }

    public function testHasId()
    {
    	$this->assertEquals('999',$this->room->id);
    }

    public function testHasBeds()
    {
    	$this->assertEquals(1, $this->room->beds);
    }
}
