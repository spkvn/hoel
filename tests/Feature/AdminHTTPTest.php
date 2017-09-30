<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Room;
use App\Card;
use App\Booking;
use App\RoomImage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminHTTPTest extends TestCase
{
	use DatabaseTransactions;
	private $user;
	public function setUp()
	{
		parent::setUp();
		$this->user = factory(User::class)->create(['category' => 'Administrator']);
	}

    public function testGetDashboard()
    {
        $response = $this->actingAs($this->user)
        		 		 ->get('/')
        		 		 ->assertRedirect('/dashboard');
    }

    public function testGetUsers()
    {
        $response = $this->actingAs($this->user)
        		 		 ->get('/admin/users')
        		 		 ->assertStatus(200)
        		 		 ->assertSee("User Management");
    }    
    
    public function testGetUserEdit()
    {
    	//find user to edit
    	$user = User::find('1');

    	//access the user's page
        $response = $this->actingAs($this->user)
        		 		 ->get('/admin/user/'.$user->id)
        		 		 ->assertStatus(200)
        		 		 ->assertSee("Edit User ".$user->name);
    }

    public function testGetUserCreate()
    {
    	$response = $this->actingAs($this->user)
    					 ->get('/admin/user/create')
    					 ->assertStatus(200)
    			 		 ->assertSee('Create New User');
    }

    public function testGetRooms()
    {
    	$response = $this->actingAs($this->user)
    				  	 ->get('/admin/rooms')
    				  	 ->assertStatus(200)
    			 		 ->assertSee('Room Management')	;
    }

    public function testGetRoomEdit()
    {
    	//find room;
    	$room = Room::find('1');

    	//get room edit page
    	$response = $this->actingAs($this->user)
    					 ->get('/admin/room/'.$room->id)
    					 ->assertStatus(200)
    			 		 ->assertSee('Edit Room '.$room->room_number);
    }
    public function testGetRoomCreate()
    {
    	$response = $this->actingAs($this->user)
    					 ->get('/admin/room/create')
    					 ->assertStatus(200)
    			 		 ->assertSee('Create New Room');
    }

    public function testGetBookings()
    {
    	$response = $this->actingAs($this->user)
    					 ->get('/admin/bookings')
    					 ->assertStatus(200)
    					 ->assertSee('Booking Management');
    }

    public function testGetBookingCreate()
    {
    	$response = $this->actingAs($this->user)
    					 ->get('/admin/booking/create')
    					 ->assertStatus(200)
    					 ->assertSee('Create New Booking');
    }

    public function testGetBookingEdit()
    {
    	$booking = Booking::all()->first();
    	$response = $this->actingAs($this->user)
    					 ->get('/admin/booking/'.$booking->room->id."/".$booking->user->id."/".$booking->check_in)
    					 ->assertStatus(200)
    					 ->assertSee('Edit Booking');
    }
}