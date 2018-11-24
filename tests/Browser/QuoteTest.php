<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class QuoteTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateQuote()
    {
        $admin = \App\User::find(1);
        $quote = factory(\App\Quote::class)->make();

        

        $this->browse(function (Browser $browser) use ($admin, $quote) {
            $browser->loginAs($admin)
                ->visit(route('admin.quotes.index'))
                ->clickLink('Add new')
                ->select("customer_id", $quote->customer_id)
                ->select("contact_id", $quote->contact_id)
                ->type("partnumber", $quote->partnumber)
                ->type("partdescription", $quote->partdescription)
                ->select("process_id", $quote->process_id)
                ->type("specification", $quote->specification)
                ->type("material", $quote->material)
                ->select("method", $quote->method)
                ->type("quantity_minimum", $quote->quantity_minimum)
                ->type("quantity_maximum", $quote->quantity_maximum)
                ->type("price", $quote->price)
                ->select("units", $quote->units)
                ->type("miminum_lot_charge", $quote->miminum_lot_charge)
                ->type("quantity_price_break", $quote->quantity_price_break)
                ->type("price_break", $quote->price_break)
                ->type("thickness_minimum", $quote->thickness_minimum)
                ->type("thickness_maximum", $quote->thickness_maximum)
                ->type("weight", $quote->weight)
                ->type("surface_area", $quote->surface_area)
                ->type("baking_time_pre", $quote->baking_time_pre)
                ->type("baking_temp_pre", $quote->baking_temp_pre)
                ->type("baking_time_post", $quote->baking_time_post)
                ->type("baking_temp_post", $quote->baking_temp_post)
                ->type("bake_notes", $quote->bake_notes)
                ->check("blasting")
                ->type("blast_notes", $quote->blast_notes)
                ->check("masking")
                ->type("mask_notes", $quote->mask_notes)
                ->check("testing")
                ->type("testing_note", $quote->testing_note)
                ->attach("print", base_path("tests/_resources/test.jpg"))
                ->type("notes", $quote->notes)
                ->type("comments", $quote->comments)
                ->select("user_id", $quote->user_id)
                ->press('Save')
                ->assertRouteIs('admin.quotes.index')
                ->assertSeeIn("tr:last-child td[field-key='customer']", $quote->customer->name)
                ->assertSeeIn("tr:last-child td[field-key='partnumber']", $quote->partnumber)
                ->assertSeeIn("tr:last-child td[field-key='process']", $quote->process->name)
                ->assertSeeIn("tr:last-child td[field-key='quantity_minimum']", $quote->quantity_minimum)
                ->assertSeeIn("tr:last-child td[field-key='quantity_maximum']", $quote->quantity_maximum)
                ->assertSeeIn("tr:last-child td[field-key='price']", $quote->price)
                ->assertSeeIn("tr:last-child td[field-key='miminum_lot_charge']", $quote->miminum_lot_charge);
        });
    }

    public function testEditQuote()
    {
        $admin = \App\User::find(1);
        $quote = factory(\App\Quote::class)->create();
        $quote2 = factory(\App\Quote::class)->make();

        

        $this->browse(function (Browser $browser) use ($admin, $quote, $quote2) {
            $browser->loginAs($admin)
                ->visit(route('admin.quotes.index'))
                ->click('tr[data-entry-id="' . $quote->id . '"] .btn-info')
                ->select("customer_id", $quote2->customer_id)
                ->select("contact_id", $quote2->contact_id)
                ->type("partnumber", $quote2->partnumber)
                ->type("partdescription", $quote2->partdescription)
                ->select("process_id", $quote2->process_id)
                ->type("specification", $quote2->specification)
                ->type("material", $quote2->material)
                ->select("method", $quote2->method)
                ->type("quantity_minimum", $quote2->quantity_minimum)
                ->type("quantity_maximum", $quote2->quantity_maximum)
                ->type("price", $quote2->price)
                ->select("units", $quote2->units)
                ->type("miminum_lot_charge", $quote2->miminum_lot_charge)
                ->type("quantity_price_break", $quote2->quantity_price_break)
                ->type("price_break", $quote2->price_break)
                ->type("thickness_minimum", $quote2->thickness_minimum)
                ->type("thickness_maximum", $quote2->thickness_maximum)
                ->type("weight", $quote2->weight)
                ->type("surface_area", $quote2->surface_area)
                ->type("baking_time_pre", $quote2->baking_time_pre)
                ->type("baking_temp_pre", $quote2->baking_temp_pre)
                ->type("baking_time_post", $quote2->baking_time_post)
                ->type("baking_temp_post", $quote2->baking_temp_post)
                ->type("bake_notes", $quote2->bake_notes)
                ->check("blasting")
                ->type("blast_notes", $quote2->blast_notes)
                ->check("masking")
                ->type("mask_notes", $quote2->mask_notes)
                ->check("testing")
                ->type("testing_note", $quote2->testing_note)
                ->attach("print", base_path("tests/_resources/test.jpg"))
                ->type("notes", $quote2->notes)
                ->type("comments", $quote2->comments)
                ->check("archive")
                ->press('Update')
                ->assertRouteIs('admin.quotes.index')
                ->assertSeeIn("tr:last-child td[field-key='customer']", $quote2->customer->name)
                ->assertSeeIn("tr:last-child td[field-key='partnumber']", $quote2->partnumber)
                ->assertSeeIn("tr:last-child td[field-key='process']", $quote2->process->name)
                ->assertSeeIn("tr:last-child td[field-key='quantity_minimum']", $quote2->quantity_minimum)
                ->assertSeeIn("tr:last-child td[field-key='quantity_maximum']", $quote2->quantity_maximum)
                ->assertSeeIn("tr:last-child td[field-key='price']", $quote2->price)
                ->assertSeeIn("tr:last-child td[field-key='miminum_lot_charge']", $quote2->miminum_lot_charge);
        });
    }

    public function testShowQuote()
    {
        $admin = \App\User::find(1);
        $quote = factory(\App\Quote::class)->create();

        


        $this->browse(function (Browser $browser) use ($admin, $quote) {
            $browser->loginAs($admin)
                ->visit(route('admin.quotes.index'))
                ->click('tr[data-entry-id="' . $quote->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='customer']", $quote->customer->name)
                ->assertSeeIn("td[field-key='contact']", $quote->contact->last_name)
                ->assertSeeIn("td[field-key='partnumber']", $quote->partnumber)
                ->assertSeeIn("td[field-key='partdescription']", $quote->partdescription)
                ->assertSeeIn("td[field-key='process']", $quote->process->name)
                ->assertSeeIn("td[field-key='specification']", $quote->specification)
                ->assertSeeIn("td[field-key='material']", $quote->material)
                ->assertSeeIn("td[field-key='method']", $quote->method)
                ->assertSeeIn("td[field-key='quantity_minimum']", $quote->quantity_minimum)
                ->assertSeeIn("td[field-key='quantity_maximum']", $quote->quantity_maximum)
                ->assertSeeIn("td[field-key='price']", $quote->price)
                ->assertSeeIn("td[field-key='units']", $quote->units)
                ->assertSeeIn("td[field-key='miminum_lot_charge']", $quote->miminum_lot_charge)
                ->assertSeeIn("td[field-key='quantity_price_break']", $quote->quantity_price_break)
                ->assertSeeIn("td[field-key='price_break']", $quote->price_break)
                ->assertSeeIn("td[field-key='thickness_minimum']", $quote->thickness_minimum)
                ->assertSeeIn("td[field-key='thickness_maximum']", $quote->thickness_maximum)
                ->assertSeeIn("td[field-key='weight']", $quote->weight)
                ->assertSeeIn("td[field-key='surface_area']", $quote->surface_area)
                ->assertSeeIn("td[field-key='baking_time_pre']", $quote->baking_time_pre)
                ->assertSeeIn("td[field-key='baking_temp_pre']", $quote->baking_temp_pre)
                ->assertSeeIn("td[field-key='baking_time_post']", $quote->baking_time_post)
                ->assertSeeIn("td[field-key='baking_temp_post']", $quote->baking_temp_post)
                ->assertSeeIn("td[field-key='bake_notes']", $quote->bake_notes)
                ->assertNotChecked("blasting")
                ->assertSeeIn("td[field-key='blast_notes']", $quote->blast_notes)
                ->assertNotChecked("masking")
                ->assertSeeIn("td[field-key='mask_notes']", $quote->mask_notes)
                ->assertNotChecked("testing")
                ->assertSeeIn("td[field-key='testing_note']", $quote->testing_note)
                ->assertSeeIn("td[field-key='notes']", $quote->notes)
                ->assertSeeIn("td[field-key='comments']", $quote->comments)
                ->assertSeeIn("td[field-key='user']", $quote->user->name);
        });
    }
}
