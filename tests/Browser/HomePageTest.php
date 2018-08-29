<?php

namespace Tests\Browser;



use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomePageTest
{

    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }
}
