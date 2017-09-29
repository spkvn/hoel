<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Booking;

class BookingTest extends TestCase
{
    public function setUp()
    {
    	$this->booking 			  = new Booking();
    	$this->booking->user_id   = '4321';
    	$this->booking->room_id   = '1234';
    	$this->booking->check_in  = '2017-10-01';
    	$this->booking->check_out = '2017-10-05';
    }

    public function testHasUser()
    {
        $this->assertEquals('4321', $this->booking->user_id);
    }

    public function testHasRoom()
    {
        $this->assertEquals('1234', $this->booking->room_id);
    }
    
    public function testHasCheckIn()
    {
        $this->assertEquals('2017-10-01', $this->booking->check_in);
    }
    
    public function testHasCheckOut()
    {
        $this->assertEquals('2017-10-05', $this->booking->check_out);
    }
}