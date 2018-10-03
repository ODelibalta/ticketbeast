<?php

namespace Tests\Browser;

use App\Concert;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewConcertListingTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test */
    public function user_can_view_a_concert_listing()
    {
        $concert = Concert::create([
            'title' => 'The Red Chord',
            'subtitle' => 'with Animosity and Lethargy',
            'date' => Carbon::parse('December 13, 2016 8:00pm'),
            'ticket_price' => 3250, // instead of storing floats, store as int bc mysql
            'venue' => 'The Mosh Pit',
            'venue_address' => '123 Example Lane',
            'city' => 'Laraville',
            'state' => 'ON',
            'zip' => '17916',
            'additional_information' => 'For tickets, call (555) 555-5555.',
        ]);

        $this->browse(function (Browser $browser) use ($concert) {
            $browser->visit('/concerts/'.$concert->id)
                    ->assertSee('The Red Chord')
                    ->assertSee('with Animosity and Lethargy')
                    ->assertSee('December 13, 2016 8:00pm')
                    ->assertSee('32.50')
                    ->assertSee('The Mosh Pit')
                    ->assertSee('123 Example Lane')
                    ->assertSee('Laraville ON, 17916')
                    ->assertSee('For tickets, call (555) 555-5555.');
        });
    }
}
