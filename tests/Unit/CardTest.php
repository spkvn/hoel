<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Card;

class CardTest extends TestCase
{
	public function setUp()
	{
		$this->card 		 = new Card();
		$this->card->access  = '1234';
		$this->card->user_id = '4321';
		$this->card->id 	 = '1010';
	}
    public function testHasRoom()
    {
        $this->assertEquals('1234',$this->card->access);
    }
    public function testHasUser()
    {
        $this->assertEquals('4321',$this->card->user_id);
    }
    public function testHasId()
    {
        $this->assertEquals('1010',$this->card->id);
    }
}
