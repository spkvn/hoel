<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
class UserTest extends TestCase
{
    private $room; 
	
	//set up runs before each test.
	//This means if we modify some data in a test,
	//it will be re-initalized in this method.
	public function setUp()
	{
		$this->user = new User();
		$this->user->id = "999";
		$this->user->name = "name";
		$this->user->email = "email@w.com";
		$this->user->password = "password";
		$this->user->category = "patron";
	}

	public function testHasName()
	{
		$this->assertEquals("name",$this->user->name);
	}

	public function testHasEmail()
	{
		$this->assertEquals("email@w.com",$this->user->email);
	}

    public function testHasPassword()
    {
    	$this->assertEquals("password",$this->user->password);
    }

    public function testHasId()
    {
    	$this->assertEquals('999',$this->user->id);
    }

    public function testHasCategory()
    {
    	$this->assertEquals("patron", $this->user->category);
    }
}
