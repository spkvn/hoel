<?php

// namespace Tests\Unit;

// use Tests\TestCase;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;

// use App\Room;
// use App\Booking;
// use App\Card;
// use App\User;

// class RoomTest extends TestCase
// {
// 	private $user; 
// 	private $room;
// 	private $card;
// 	private $booking;
// 	//sets member data
// 	public function __construct()
// 	{
// 		//$pass = bcrypt('password');
// 		$user = User::create([
// 			'name' => 'testuser',
// 			'email' => 'test@user.com',
// 			'password' => 'password',
// 			'category' => 'Administrator'
// 		]);
// 		$room = Room::create([
// 			'room_number' => '9876',
// 			'beds' => 4,
// 			'max_capacity' => 4,
// 			'price_per_night'=> 18
// 		]);
// 		$card = Card::create([
// 			'access' => $room->id,
// 			'user_id' => $user->id
// 		]);
// 		$booking = Booking::create([
// 			'room_id' => $room->id,
// 			'user_id' => $user->id,
// 			'check_in' => strtotime('today'),
// 			'check_out' => strtotime('tomorrow')
// 		]);
// 		echo 'Room Properties created'.PHP_EOL;
// 	}

// 	//deletes member data
// 	public function __destruct()
// 	{
// 		$booking->delete();
// 		$card->delete();
// 		$room->delete();
// 		$user->delete();
// 	}

// 	/**
//      * A basic test example.
//      *
//      * @return void
//      */
//     public function testExample()
//     {
//         $this->assertTrue(true);
//     }
// }
