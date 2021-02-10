<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::factory()->create([
            "email" => "taylor@laravel.com",
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type("email", $user->email)
                ->type("password", "password")
                ->press("login")
                ->assertPathIs("/dashboard");
        });
    }
}
