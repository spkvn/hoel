<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Room;
use App\User;

class AdminRoomTest extends DuskTestCase
{
    private $user;
    private $room; 
    private $room_number;
    // using constructor over setUp because I only want one user
    public function __construct()
    {
        parent::setUp();
        $this->user = factory(User::class)->create(['category'=>'Administrator']);
        $this->room = null;
    }

    public function testAdminLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('email',$this->user->email)
                    ->type('password','secret')
                    ->press('Sign In')
                    ->assertSee('Administrator dashboard');
        });
    }

    public function testAdminRoomCreate()
    {
        $this->browse(function (Browser $browser) {
        $room_number = rand(1000,9999);
            $browser->visit('/')
                    ->press('Rooms')
                    ->assertSee('Room Management')
                    ->press('Add Room')
                    ->assertSee('Create New Room')
                    ->type('room_number', $room_number)
                    ->type('beds', rand(1,10))
                    ->type('max_capacity',rand(1,20))
                    ->type('price_per_night',rand(100,1000))
                    ->press('Submit')
                    ->assertSee($room_number);
        });
    }
    public function testAdminRoomEdit()
    {
        $this->browse(function (Browser $browser){
            $firstRoom = Room::all()->first();
            $changedBeds = rand(1,20);
            $browser->visit('/admin/rooms')
                    ->press('#editRoom'.$firstRoom->id)
                    ->type('room_number',rand(1000,9999))
                    ->type('beds', $changedBeds)
                    ->type('max_capacity',rand(1,20))
                    ->type('price_per_night',rand(100,1000))
                    ->press('Submit')
                    ->assertSee($changedBeds);
        });
    }
     public function testAdminRoomDelete()
    {
        $this->browse(function (Browser $browser) {
            $firstRoom = Room::all()->first();
            $browser->visit('/admin/rooms')
                    ->press('#deleteRoom'.$firstRoom->id);
            sleep(2);    //account for modal to appear
            $browser->press('#delButton'.$firstRoom->id)
                    ->assertDontSee($firstRoom->room_number);
        });
    }

    public function __destruct()
    {
        $this->user->delete();
        if(isset($this->room))
        {
            $this->room->delete();
        }
    }
}
