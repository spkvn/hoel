<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class LoginTest extends DuskTestCase
{
    // use DatabaseTransactions;

    public function testAdminLogin()
    {
        parent::setUp();
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create(['category' => 'Administrator']);
            $browser->visit('/')
                    ->type('email',$user->email)
                    ->type('password','secret')
                    ->press('Sign In')
                    ->assertSee('Administrator dashboard');
            $browser->press('Log Out');
            $user->delete();
        });
    }

    public function testPatronLogin()
    {
        parent::setUp();
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create(['category' => 'Patron']);
            $browser->visit('/')
                    ->type('email',$user->email)
                    ->type('password','secret')
                    ->press('Sign In')
                    ->assertSee('Patron dashboard');
            $browser->press('Log Out');
            $user->delete();
        });
    }

    public function testHousekeepingLogin()
    {
        parent::setUp();
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create(['category' => 'Housekeeping']);
            $browser->visit('/')
                    ->type('email',$user->email)
                    ->type('password','secret')
                    ->press('Sign In')
                    ->assertSee('Housekeeping dashboard');
            $browser->press('Log Out');  
            $user->delete();                  
        });
    }

    public function testReceptionLogin()
    {
        parent::setUp();
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create(['category' => 'Reception']);
            $browser->visit('/')
                    ->type('email',$user->email)
                    ->type('password','secret')
                    ->press('Sign In')
                    ->assertSee('Reception dashboard');
            $browser->press('Log Out');
            $user->delete();
        });
    }

    public function testIncorrectCredentials()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/')
                    ->type('email', 'nonsense@email.address.goes.here.com.im.relying.on.the.fact.none.registers.this.email')
                    ->type('password','secret')
                    ->press('Sign In')
                    ->assertSee('Check Credentials');
        });
    }
}
