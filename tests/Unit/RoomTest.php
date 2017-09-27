<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Room;

class RoomTest extends TestCase
{
	private $room; 
	
	//set up runs before each test.
	//This means if we modify some data in a test,
	//it will be re-initalized in this method.
	public function setUp()
	{
		$this->room = new Room();
		$this->room->id = "999";
		$this->room->room_number = "9999";
		$this->room->beds = 1;
		$this->room->max_capacity = 2;
		$this->room->price_per_night = 400;
	}

	public function testHasMaxCapacity()
	{
		$this->assertEquals(2,$this->room->max_capacity);
	}

	public function testHasPricePerNight()
	{
		$this->assertEquals(400,$this->room->price_per_night);
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
