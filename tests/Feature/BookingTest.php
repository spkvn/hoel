<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Booking;
use App\Room;
use App\User;

class BookingTest extends TestCase
{
	use DatabaseTransactions;
	private $users;
	private $rooms;
	private $booking0;
	private $booking1;
	public function setUp()
	{
		//required for factories
		parent::setUp();
		
		$this->users = factory(User::class,2)->create();
	    $this->rooms = factory(Room::class,2)->create();
        
        $this->booking0 = factory(Booking::class)->create([
        	'user_id' => $this->users[0]->id, 
        	'room_id' => $this->rooms[0]->id
        ]);
        
        $this->booking1 = factory(Booking::class)->create([
        	'user_id' => $this->users[1]->id,
        	'room_id' => $this->rooms[0]->id
        ]);

	}
    public function testUserRelation()
    {
    	$user = $this->booking0->user;

    	$this->assertEquals($user->id,$this->users[0]->id);
    }

    public function testRoomRelation()
    {
    	$room = $this->booking0->room;

    	$this->assertEquals($room->id, $this->rooms[0]->id);
    }

}
