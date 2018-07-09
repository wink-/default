<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CustomerTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateCustomer()
    {
        $admin = \App\User::find(1);
        $customer = factory('App\Customer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $customer) {
            $browser->loginAs($admin)
                ->visit(route('admin.customers.index'))
                ->clickLink('Add new')
                ->type("code", $customer->code)
                ->type("name", $customer->name)
                ->type("physical_address", $customer->physical_address)
                ->type("address_extension", $customer->address_extension)
                ->type("city", $customer->city)
                ->type("state", $customer->state)
                ->type("zip", $customer->zip)
                ->type("company_phone", $customer->company_phone)
                ->type("fax", $customer->fax)
                ->type("email", $customer->email)
                ->type("note", $customer->note)
                ->type("billing_address", $customer->billing_address)
                ->type("billing_city", $customer->billing_city)
                ->type("billing_state", $customer->billing_state)
                ->type("billing_zip", $customer->billing_zip)
                ->type("billing_phone", $customer->billing_phone)
                ->type("billing_fax", $customer->billing_fax)
                ->type("billing_email", $customer->billing_email)
                ->type("ship_to_address", $customer->ship_to_address)
                ->type("ship_to_city", $customer->ship_to_city)
                ->type("ship_to_state", $customer->ship_to_state)
                ->type("ship_to_zip", $customer->ship_to_zip)
                ->type("ship_to_phone", $customer->ship_to_phone)
                ->type("ship_to_fax", $customer->ship_to_fax)
                ->type("ship_to_email", $customer->ship_to_email)
                ->press('Save')
                ->assertRouteIs('admin.customers.index')
                ->assertSeeIn("tr:last-child td[field-key='code']", $customer->code)
                ->assertSeeIn("tr:last-child td[field-key='name']", $customer->name)
                ->assertSeeIn("tr:last-child td[field-key='physical_address']", $customer->physical_address)
                ->assertSeeIn("tr:last-child td[field-key='city']", $customer->city)
                ->assertSeeIn("tr:last-child td[field-key='state']", $customer->state)
                ->assertSeeIn("tr:last-child td[field-key='company_phone']", $customer->company_phone);
        });
    }

    public function testEditCustomer()
    {
        $admin = \App\User::find(1);
        $customer = factory('App\Customer')->create();
        $customer2 = factory('App\Customer')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $customer, $customer2) {
            $browser->loginAs($admin)
                ->visit(route('admin.customers.index'))
                ->click('tr[data-entry-id="' . $customer->id . '"] .btn-info')
                ->type("code", $customer2->code)
                ->type("name", $customer2->name)
                ->type("physical_address", $customer2->physical_address)
                ->type("address_extension", $customer2->address_extension)
                ->type("city", $customer2->city)
                ->type("state", $customer2->state)
                ->type("zip", $customer2->zip)
                ->type("company_phone", $customer2->company_phone)
                ->type("fax", $customer2->fax)
                ->type("email", $customer2->email)
                ->type("contact1", $customer2->contact1)
                ->type("extension1", $customer2->extension1)
                ->type("contact2", $customer2->contact2)
                ->type("phone2", $customer2->phone2)
                ->type("extension2", $customer2->extension2)
                ->type("note", $customer2->note)
                ->type("billing_address", $customer2->billing_address)
                ->type("billing_city", $customer2->billing_city)
                ->type("billing_state", $customer2->billing_state)
                ->type("billing_zip", $customer2->billing_zip)
                ->type("billing_phone", $customer2->billing_phone)
                ->type("billing_fax", $customer2->billing_fax)
                ->type("billing_email", $customer2->billing_email)
                ->type("ship_to_address", $customer2->ship_to_address)
                ->type("ship_to_city", $customer2->ship_to_city)
                ->type("ship_to_state", $customer2->ship_to_state)
                ->type("ship_to_zip", $customer2->ship_to_zip)
                ->type("ship_to_phone", $customer2->ship_to_phone)
                ->type("ship_to_fax", $customer2->ship_to_fax)
                ->type("ship_to_email", $customer2->ship_to_email)
                ->type("tax_id", $customer2->tax_id)
                ->check("cod")
                ->check("archive")
                ->press('Update')
                ->assertRouteIs('admin.customers.index')
                ->assertSeeIn("tr:last-child td[field-key='code']", $customer2->code)
                ->assertSeeIn("tr:last-child td[field-key='name']", $customer2->name)
                ->assertSeeIn("tr:last-child td[field-key='physical_address']", $customer2->physical_address)
                ->assertSeeIn("tr:last-child td[field-key='city']", $customer2->city)
                ->assertSeeIn("tr:last-child td[field-key='state']", $customer2->state)
                ->assertSeeIn("tr:last-child td[field-key='company_phone']", $customer2->company_phone);
        });
    }

    public function testShowCustomer()
    {
        $admin = \App\User::find(1);
        $customer = factory('App\Customer')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $customer) {
            $browser->loginAs($admin)
                ->visit(route('admin.customers.index'))
                ->click('tr[data-entry-id="' . $customer->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='code']", $customer->code)
                ->assertSeeIn("td[field-key='name']", $customer->name)
                ->assertSeeIn("td[field-key='physical_address']", $customer->physical_address)
                ->assertSeeIn("td[field-key='address_extension']", $customer->address_extension)
                ->assertSeeIn("td[field-key='city']", $customer->city)
                ->assertSeeIn("td[field-key='state']", $customer->state)
                ->assertSeeIn("td[field-key='zip']", $customer->zip)
                ->assertSeeIn("td[field-key='company_phone']", $customer->company_phone)
                ->assertSeeIn("td[field-key='fax']", $customer->fax)
                ->assertSeeIn("td[field-key='email']", $customer->email)
                ->assertSeeIn("td[field-key='contact1']", $customer->contact1)
                ->assertSeeIn("td[field-key='extension1']", $customer->extension1)
                ->assertSeeIn("td[field-key='contact2']", $customer->contact2)
                ->assertSeeIn("td[field-key='phone2']", $customer->phone2)
                ->assertSeeIn("td[field-key='extension2']", $customer->extension2)
                ->assertSeeIn("td[field-key='note']", $customer->note)
                ->assertSeeIn("td[field-key='billing_address']", $customer->billing_address)
                ->assertSeeIn("td[field-key='billing_city']", $customer->billing_city)
                ->assertSeeIn("td[field-key='billing_state']", $customer->billing_state)
                ->assertSeeIn("td[field-key='billing_zip']", $customer->billing_zip)
                ->assertSeeIn("td[field-key='billing_phone']", $customer->billing_phone)
                ->assertSeeIn("td[field-key='billing_fax']", $customer->billing_fax)
                ->assertSeeIn("td[field-key='billing_email']", $customer->billing_email)
                ->assertSeeIn("td[field-key='ship_to_address']", $customer->ship_to_address)
                ->assertSeeIn("td[field-key='ship_to_city']", $customer->ship_to_city)
                ->assertSeeIn("td[field-key='ship_to_state']", $customer->ship_to_state)
                ->assertSeeIn("td[field-key='ship_to_zip']", $customer->ship_to_zip)
                ->assertSeeIn("td[field-key='ship_to_phone']", $customer->ship_to_phone)
                ->assertSeeIn("td[field-key='ship_to_fax']", $customer->ship_to_fax)
                ->assertSeeIn("td[field-key='ship_to_email']", $customer->ship_to_email)
                ->assertSeeIn("td[field-key='tax_id']", $customer->tax_id)
                ->assertNotChecked("cod")
                ->assertNotChecked("archive")
                ->assertSeeIn("td[field-key='revision']", $customer->revision);
        });
    }

}
