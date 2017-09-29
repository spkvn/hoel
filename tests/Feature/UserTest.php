<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Booking;
use App\Room;

class UserTest extends TestCase
{
	use DatabaseTransactions;
	private $user;
	private $room;
	private $booking;
	public function setUp()
	{
		parent::setUp();

		$this->user 	= factory(User::class)->create();
		$this->room 	= factory(Room::class)->create();
		$this->booking  = factory(Booking::class)->create([
			'user_id' => $this->user->id,
			'room_id' => $this->room->id
		]);
	}

    public function testBookingRelationship()
    {
        $this->assertEquals(
        	[$this->user->id , $this->room->id],
        	[$this->user->bookings->first()->user_id, $this->user->bookings->first()->room_id]
        );
    }
}
