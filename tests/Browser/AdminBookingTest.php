<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Booking;
use App\User;
use App\Room;

class AdminBookingTest extends DuskTestCase
{
    private $room;
    private $admin;
    private $patron;
    private $booking;
    private $nextWeek;
    private $twoWeeks;
    public function __construct()
    {
        parent::setUp();
        $this->room = factory(Room::class)->create();
        $this->admin = factory(User::class)->create([
            'category' => 'Administrator']
        );
        $this->patron = factory(User::class)->create([
            'category' => 'Patron']
        );
        $this->nextWeek = date('Y-m-d',time()+(7 * 24 * 60 * 60));
        $this->twoWeeks = date('Y-m-d',time()+(14 * 24 * 60 * 60));
        $this->oneMonth = date('Y-m-d',time()+(30 * 24 * 60 * 60));
    }

    public function testAdminLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('email',$this->admin->email)
                    ->type('password','secret')
                    ->press('Sign In')
                    ->assertSee('Administrator dashboard');
        });
    }

    public function testAdminCardCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->press('Bookings')
                    ->assertSee('Booking Management')
                    ->press('Add Booking')
                    ->assertSee('Create New Booking')
                    ->type('room_number', $this->room->room_number)
                    ->type('email', $this->patron->email)
                    ->type('check_in', $this->nextWeek)
                    ->type('check_out', $this->twoWeeks)
                    ->press('Submit')
                    ->assertSee($this->patron->name)
                    ->assertSee($this->room->room_number);
        });
    }
    
    public function testAdminCardEdit()
    {
        $this->browse(function (Browser $browser){
            //Needs to -1 the room id for some reason, somehow increments between tests?
            $this->booking = Booking::
                                where('room_id' , '=', $this->room->id-1)
                              ->where('user_id', '=', $this->patron->id)
                              ->where('check_in', '=', $this->nextWeek)
                              ->firstOrFail();

            //update class members to new objects
            $this->room = Room::where('id', '=', '15')->first();
            $patrons = User::where('category','=','Patron')->get();
            //pick not the first patron
            $this->patron = $patrons[1];
            
            $browser->visit('/admin/bookings')
                    ->press('#editBooking'.$this->booking->room_id.$this->booking->user_id.$this->booking->check_in)
                    ->type('room_number',$this->room->room_number)
                    ->type('email',$this->patron->email)
                    ->type('check_in', $this->twoWeek)
                    ->type('check_out', $this->oneMonth)
                    ->press('Submit')
                    ->assertSee($this->patron->name)
                    ->assertSee($this->room->room_number);
        });
    }

    public function testAdminCardDelete()
    {
        $this->browse(function (Browser $browser) {
            $this->booking = Booking::
                                where('room_id' , '=', $this->room->id-1)
                              ->where('user_id', '=', $this->patron->id)
                              ->where('check_in', '=', $this->nextWeek)
                              ->firstOrFail();
            
            $this->room = Room::where('id', '=', '15')->first();
            $patrons = User::where('category','=','Patron')->get();
            $this->patron = $patrons[1];

            $browser->visit('/admin/bookings')
                    ->press('#deleteBooking'.$this->booking->room_id.$this->booking->user_id.$this->booking->check_in);
            sleep(2);    //account for modal to appear
            $browser->press('#delButton'.$this->card->id)
                    ->assertDontSee($this->room->room_number)
                    ->assertDontSee($this->patron->name);
        });
    }
}
