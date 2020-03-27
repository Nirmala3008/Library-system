<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class LoginPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
            ->assertSee('Welcome to Nitseditor')
            ->assertSee('Sign In')
            ->type('@login-email', 'superadmin@nitseditor.com')
            ->type('@login-password', 'password')
            ->click('@login-submit')
            ->waitForLocation('/admin/dashboard')
            ->assertPathIs('/admin/dashboard')
            ->assertSee('Welcome to Noetic IT Services Pvt. Ltd.');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
//            '@element' => '#selector',
        ];
    }
}
