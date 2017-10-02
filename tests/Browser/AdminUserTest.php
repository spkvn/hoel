<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class AdminUserTest extends DuskTestCase
{
    private $user; 
    // using constructor over setUp because I only want one user
    public function __construct()
    {
        parent::setUp();
        $this->user = factory(User::class)->create(['category'=>'Administrator']);
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

    public function testAdminUserCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->press('Users')
                    ->assertSee('User Management')
                    ->press('Add User')
                    ->assertSee('Create New User')
                    ->type('name', 'Kevin')
                    ->type('email','Kevin@kevin.com')
                    ->type('password','secret')
                    ->type('password_confirmation','secret')
                    ->select('category','Patron')
                    ->press('Submit')
                    // will be redirected back to user management page on success
                    // so we can check if the new user is there
                    ->assertSee('Kevin@kevin.com');
        });
    }
    public function testAdminUserEdit()
    {
        $this->browse(function (Browser $browser){
            $createdUser = User::where('email', '=', 'Kevin@kevin.com')->first();
             $browser->visit('/admin/users')
                    ->press('#editUser'.$createdUser->id)
                    ->type('name', 'KevinTwo')
                    ->type('email','Kevin@kevin.com')
                    ->type('password','secret')
                    ->type('password_confirmation','secret')
                    ->select('category','Patron')
                    ->press('Submit')
                    ->assertSee('KevinTwo');
        });
    }

    public function testAdminUserDelete()
    {
        $this->browse(function (Browser $browser) {
            $createdUser = User::where('email', '=', 'Kevin@kevin.com')->first();
            $browser->visit('/admin/users')
                    ->press('#deleteUser'.$createdUser->id);
            sleep(2);    //account for modal to appear
            $browser->press('#delButton'.$createdUser->id)
                    ->assertDontSee('Kevin@kevin.com');
        });
    }

    public function __destruct()
    {
        $this->user->delete();
    }
}