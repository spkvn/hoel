<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Room;
use App\User;
use App\Card;

class CardTest extends TestCase
{
    use DatabaseTransactions; 
    private $user; 
    private $room;
    private $card;

    public function setUp()
    {
    	parent::setUp();
		$this->user = factory(User::class)->create();
	    $this->room = factory(Room::class)->create();
	    $this->card = factory(Card::class)->create([
	    	'access'  => $this->room->id,
	    	'user_id' => $this->user->id
	    ]);
    }

    public function testUserRelation()
    {
    	$user = $this->card->user;

    	$this->assertEquals($user->id, $this->user->id);
    }

    public function testRoomRelation()
    {
    	$room = $this->card->room;

    	$this->assertEquals($room->id, $this->room->id);
    }
}