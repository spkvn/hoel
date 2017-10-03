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
    private $nextWeekYmd;
    private $nextWeekdmY;
    private $twoWeeksdmY;
    private $twoWeeksYmd;
    private $oneMonthdmY;
    private $oneMonthYmd;

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
        $this->nextWeekYmd = date('Y-m-d',time()+(7 * 24 * 60 * 60));
        $this->twoWeeksYmd = date('Y-m-d',time()+(14 * 24 * 60 * 60));
        $this->oneMonthYmd = date('Y-m-d',time()+(30 * 24 * 60 * 60));
        $this->nextWeekdmY = date('d/m/Y',time()+(7 * 24 * 60 * 60));
        $this->twoWeeksdmY = date('d/m/Y',time()+(14 * 24 * 60 * 60));
        $this->twoWeeksPlusdmY = date('d/m/Y',time()+(20 * 24 * 60 * 60));
        $this->oneMonthdmY = date('d/m/Y',time()+(30 * 24 * 60 * 60));
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
                    ->type('check_in', $this->nextWeekdmY)
                    ->type('check_out', $this->twoWeeksdmY)
                    ->press('Submit')
                    ->assertSee($this->patron->name)
                    ->assertSee($this->room->room_number);
        });
    }
    
    public function testAdminCardEdit()
    {
        $this->browse(function (Browser $browser){
            $this->booking = Booking::
                                where('room_id' , '=', $this->room->id-1)
                              ->where('user_id', '=', $this->patron->id-2)
                              ->where('check_in', '=', $this->nextWeekYmd)
                              ->firstOrFail();

            //update class members to new objects
            $this->room = factory(Room::class)->create();
            $this->patron = factory(User::class)->create(['category'=>'Patron']);
            
            $browser->visit('/admin/bookings')
                    ->press('#editBooking'.$this->booking->room_id.$this->booking->user_id.$this->booking->check_in)
                    ->type('room_number',$this->room->room_number)
                    ->type('email',$this->patron->email)
                    ->type('check_in', $this->twoWeeksPlusdmY)
                    ->type('check_out', $this->oneMonthdmY)
                    ->press('Submit')
                    ->assertSee($this->patron->name)
                    ->assertSee($this->room->room_number);
        });
    }

    public function testAdminCardDelete()
    {
        $this->browse(function (Browser $browser) {
            // dd($this->room->id,$this->patron->id,$this->nextWeekYmd);
            $this->booking = Booking::all()->first();

            $browser->visit('/admin/bookings')
                    ->press('#deleteBooking'.$this->booking->room_id.$this->booking->user_id.$this->booking->check_in);
            sleep(2);    //account for modal to appear
            $browser->press('#delButton'.$this->booking->room_id.$this->booking->user_id.$this->booking->check_in)
                    ->assertDontSee($this->room->room_number)
                    ->assertDontSee($this->patron->name);
        });
    }
}
