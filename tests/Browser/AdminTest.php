<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminTest extends DuskTestCase
{
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
}
