<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Room;
use App\Card;

class AdminCardTest extends DuskTestCase
{
    private $room;
    private $user;
    private $patron;
    private $card;

    public function __construct()
    {
        parent::setUp();
        $this->room = factory(Room::class)->create();
        $this->user = factory(User::class)->create([
            'category' => 'Administrator']
        );
        $this->patron = User::where('category','=','Patron')->first();
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

    public function testAdminCardCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->press('Cards')
                    ->assertSee('Access Card Management')
                    ->press('Add Card')
                    ->assertSee('Create New Card')
                    ->type('room_number', $this->room->room_number)
                    ->type('email', $this->patron->email)
                    ->press('Submit')
                    ->assertSee($this->patron->name)
                    ->assertSee($this->room->room_number);
        });
    }
    
    public function testAdminCardEdit()
    {
        $this->browse(function (Browser $browser){
            //Needs to -1 the room id for some reason, somehow increments between tests?
            $this->card = Card::where('access' , '=', $this->room->id-1)
                              ->where('user_id', '=', $this->patron->id)
                              ->firstOrFail();

            //update class members to new objects
            $this->room = Room::where('id', '=', '10')->first();
            $patrons = User::where('category','=','Patron')->get();
            //pick not the first patron
            $this->patron = $patrons[1];
            
            $browser->visit('/admin/cards')
                    ->press('#editCard'.$this->card->id)
                    ->type('room_number',$this->room->room_number)
                    ->type('email',$this->patron->email)
                    ->press('Submit')
                    ->assertSee($this->patron->name)
                    ->assertSee($this->room->room_number);
        });
    }

    public function testAdminCardDelete()
    {
        $this->browse(function (Browser $browser) {
            $this->room = Room::where('id', '=', '10')->first();
            $patrons = User::where('category','=','Patron')->get();
            $this->patron = $patrons[1];

            $this->card = Card::where('access' , '=', $this->room->id)
                              ->where('user_id', '=', $this->patron->id)
                              ->firstOrFail();
            $browser->visit('/admin/cards')
                    ->press('#deleteCard'.$this->card->id);
            sleep(2);    //account for modal to appear
            $browser->press('#delButton'.$this->card->id)
                    ->assertDontSee($this->room->room_number)
                    ->assertDontSee($this->patron->name);
        });
    }
    public function __destruct()
    {
        $this->room->delete();
        $this->user->delete();
    }
}
