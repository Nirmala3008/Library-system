<?php

namespace Tests\Browser;

use Tests\Browser\Pages\AddProductPage;
use Tests\Browser\Pages\LoginPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {

//            $browser->visit('/')
//                    ->assertSee('Nits-Editor');

            $browser->visit(new LoginPage);

            $browser->visit(new AddProductPage);
        });

    }
}
