<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type("name", "User")
                ->type("email", "user@user.com")
                ->type("password", "password")
                ->type("password_confirmation", "password")
                ->click("button[type=submit]")
                ->assertSee('Welcome to your Jetstream application');
        });
    }
}
