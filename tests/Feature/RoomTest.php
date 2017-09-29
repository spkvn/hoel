<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Booking;
use App\Room;
use App\User;

class RoomTest extends TestCase
{
    use DatabaseTransactions;
	
	private $users;
	private $rooms;
	private $booking;

	public function setUp()
    {
    	//required for factories
		parent::setUp();
		
		$this->user = factory(User::class)->create();
	    $this->room = factory(Room::class)->create();
        
        $this->booking = factory(Booking::class)->create([
        	'user_id' => $this->user->id, 
        	'room_id' => $this->room->id
        ]);
    }
    public function testExample()
    {
        $this->assertEquals(
        	$this->room->bookings->first()->room_id, 
        	$this->room->id
        );
    }
}
