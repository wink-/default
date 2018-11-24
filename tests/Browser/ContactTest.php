<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ContactTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateContact()
    {
        $admin = \App\User::find(1);
        $contact = factory('App\Contact')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $contact) {
            $browser->loginAs($admin)
                ->visit(route('admin.contacts.index'))
                ->clickLink('Add new')
                ->select("customer_id", $contact->customer_id)
                ->type("first_name", $contact->first_name)
                ->type("last_name", $contact->last_name)
                ->type("phone", $contact->phone)
                ->type("extension", $contact->extension)
                ->type("email", $contact->email)
                ->press('Save')
                ->assertRouteIs('admin.contacts.index')
                ->assertSeeIn("tr:last-child td[field-key='customer']", $contact->customer->code)
                ->assertSeeIn("tr:last-child td[field-key='first_name']", $contact->first_name)
                ->assertSeeIn("tr:last-child td[field-key='last_name']", $contact->last_name)
                ->assertSeeIn("tr:last-child td[field-key='phone']", $contact->phone)
                ->assertSeeIn("tr:last-child td[field-key='extension']", $contact->extension)
                ->assertSeeIn("tr:last-child td[field-key='email']", $contact->email);
        });
    }

    public function testEditContact()
    {
        $admin = \App\User::find(1);
        $contact = factory('App\Contact')->create();
        $contact2 = factory('App\Contact')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $contact, $contact2) {
            $browser->loginAs($admin)
                ->visit(route('admin.contacts.index'))
                ->click('tr[data-entry-id="' . $contact->id . '"] .btn-info')
                ->select("customer_id", $contact2->customer_id)
                ->type("first_name", $contact2->first_name)
                ->type("last_name", $contact2->last_name)
                ->type("phone", $contact2->phone)
                ->type("extension", $contact2->extension)
                ->type("email", $contact2->email)
                ->check("archive")
                ->press('Update')
                ->assertRouteIs('admin.contacts.index')
                ->assertSeeIn("tr:last-child td[field-key='customer']", $contact2->customer->code)
                ->assertSeeIn("tr:last-child td[field-key='first_name']", $contact2->first_name)
                ->assertSeeIn("tr:last-child td[field-key='last_name']", $contact2->last_name)
                ->assertSeeIn("tr:last-child td[field-key='phone']", $contact2->phone)
                ->assertSeeIn("tr:last-child td[field-key='extension']", $contact2->extension)
                ->assertSeeIn("tr:last-child td[field-key='email']", $contact2->email);
        });
    }

    public function testShowContact()
    {
        $admin = \App\User::find(1);
        $contact = factory('App\Contact')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $contact) {
            $browser->loginAs($admin)
                ->visit(route('admin.contacts.index'))
                ->click('tr[data-entry-id="' . $contact->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='customer']", $contact->customer->code)
                ->assertSeeIn("td[field-key='first_name']", $contact->first_name)
                ->assertSeeIn("td[field-key='last_name']", $contact->last_name)
                ->assertSeeIn("td[field-key='phone']", $contact->phone)
                ->assertSeeIn("td[field-key='extension']", $contact->extension)
                ->assertSeeIn("td[field-key='email']", $contact->email)
                ->assertNotChecked("archive");
        });
    }
}
