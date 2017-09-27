<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Room;
use App\User;
use App\Booking;

class BookingTest extends TestCase
{
	private $room;
	private $user;
	private $booking;
    public function setUp()
    {
    	//Room setup
    	$this->room = new Room;
		$this->room->id = 999;
		$this->room->room_number = "9999";
		$this->room->beds = 1;
		$this->room->max_capacity = 2;
		$this->room->price_per_night = 400;
    	
    	//user setup
    	$this->user = new User;
    	$this->user->name = "Test User";
    	$this->user->email = "email@email.com";
    	$this->user->password = 'password';
    	$this->user->id = 999;
    	$this->user->category = "Patron";

    	//booking setup
    	$this->booking = new Booking;
    	$this->booking->user_id = $this->user->id;
    	$this->booking->room_id = $this->room->id;
    	$this->booking->check_in = '2017-09-27';
    	$this->booking->check_out = '2017-10-03';
    }

    public function testUserRelation()
    {
        $this->assertEquals('Test User', $this->booking->user()->name);
    }
}
