<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class WorkorderTest extends DuskTestCase
{

    public function testCreateWorkorder()
    {
        $admin = \App\User::find(1);
        $workorder = factory('App\Workorder')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $workorder) {
            $browser->loginAs($admin)
                ->visit(route('admin.workorders.index'))
                ->clickLink('Add new')
                ->select("customer_id", $workorder->customer_id)
                ->select("part_id", $workorder->part_id)
                ->type("part_number", $workorder->part_number)
                ->select("process_id", $workorder->process_id)
                ->type("price", $workorder->price)
                ->type("price_code", $workorder->price_code)
                ->type("date_received", $workorder->date_received)
                ->type("date_required", $workorder->date_required)
                ->type("customer_purchase_order", $workorder->customer_purchase_order)
                ->type("customer_packing_list", $workorder->customer_packing_list)
                ->type("quantity", $workorder->quantity)
                ->type("unit_code", $workorder->unit_code)
                ->type("quantity_shipped", $workorder->quantity_shipped)
                ->type("destination_code", $workorder->destination_code)
                ->type("carrier_code", $workorder->carrier_code)
                ->type("freight_code", $workorder->freight_code)
                ->type("priority", $workorder->priority)
                ->check("rework")
                ->check("hot")
                ->check("cod")
                ->type("note", $workorder->note)
                ->press('Save')
                ->assertRouteIs('admin.workorders.index')
                ->assertSeeIn("tr:last-child td[field-key='customer']", $workorder->customer->code)
                ->assertSeeIn("tr:last-child td[field-key='part']", $workorder->part->number)
                ->assertSeeIn("tr:last-child td[field-key='part_number']", $workorder->part_number)
                ->assertSeeIn("tr:last-child td[field-key='process']", $workorder->process->code)
                ->assertSeeIn("tr:last-child td[field-key='price']", $workorder->price)
                ->assertSeeIn("tr:last-child td[field-key='price_code']", $workorder->price_code)
                ->assertSeeIn("tr:last-child td[field-key='date_received']", $workorder->date_received)
                ->assertSeeIn("tr:last-child td[field-key='date_required']", $workorder->date_required)
                ->assertSeeIn("tr:last-child td[field-key='customer_purchase_order']", $workorder->customer_purchase_order)
                ->assertSeeIn("tr:last-child td[field-key='customer_packing_list']", $workorder->customer_packing_list)
                ->assertSeeIn("tr:last-child td[field-key='quantity']", $workorder->quantity)
                ->assertSeeIn("tr:last-child td[field-key='unit_code']", $workorder->unit_code)
                ->assertSeeIn("tr:last-child td[field-key='quantity_shipped']", $workorder->quantity_shipped)
                ->assertChecked("rework")
                ->logout();
        });
    }

    public function testEditWorkorder()
    {
        $admin = \App\User::find(1);
        $workorder = factory('App\Workorder')->create();
        $workorder2 = factory('App\Workorder')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $workorder, $workorder2) {
            $browser->loginAs($admin)
                ->visit(route('admin.workorders.index'))
                ->click('tr[data-entry-id="' . $workorder->id . '"] .btn-info')
                ->select("customer_id", $workorder2->customer_id)
                ->select("part_id", $workorder2->part_id)
                ->type("part_number", $workorder2->part_number)
                ->select("process_id", $workorder2->process_id)
                ->type("price", $workorder2->price)
                ->type("price_code", $workorder2->price_code)
                ->type("date_received", $workorder2->date_received)
                ->type("date_required", $workorder2->date_required)
                ->type("customer_purchase_order", $workorder2->customer_purchase_order)
                ->type("customer_packing_list", $workorder2->customer_packing_list)
                ->type("quantity", $workorder2->quantity)
                ->type("unit_code", $workorder2->unit_code)
                ->type("quantity_shipped", $workorder2->quantity_shipped)
                ->type("destination_code", $workorder2->destination_code)
                ->type("carrier_code", $workorder2->carrier_code)
                ->type("freight_code", $workorder2->freight_code)
                ->type("priority", $workorder2->priority)
                ->check("rework")
                ->check("hot")
                ->check("cod")
                ->type("note", $workorder2->note)
                ->press('Update')
                ->assertRouteIs('admin.workorders.index')
                ->assertSeeIn("tr:last-child td[field-key='customer']", $workorder2->customer->code)
                ->assertSeeIn("tr:last-child td[field-key='part']", $workorder2->part->number)
                ->assertSeeIn("tr:last-child td[field-key='part_number']", $workorder2->part_number)
                ->assertSeeIn("tr:last-child td[field-key='process']", $workorder2->process->code)
                ->assertSeeIn("tr:last-child td[field-key='price']", $workorder2->price)
                ->assertSeeIn("tr:last-child td[field-key='price_code']", $workorder2->price_code)
                ->assertSeeIn("tr:last-child td[field-key='date_received']", $workorder2->date_received)
                ->assertSeeIn("tr:last-child td[field-key='date_required']", $workorder2->date_required)
                ->assertSeeIn("tr:last-child td[field-key='customer_purchase_order']", $workorder2->customer_purchase_order)
                ->assertSeeIn("tr:last-child td[field-key='customer_packing_list']", $workorder2->customer_packing_list)
                ->assertSeeIn("tr:last-child td[field-key='quantity']", $workorder2->quantity)
                ->assertSeeIn("tr:last-child td[field-key='unit_code']", $workorder2->unit_code)
                ->assertSeeIn("tr:last-child td[field-key='quantity_shipped']", $workorder2->quantity_shipped)
                ->assertChecked("rework")
                ->logout();
        });
    }

    public function testShowWorkorder()
    {
        $admin = \App\User::find(1);
        $workorder = factory('App\Workorder')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $workorder) {
            $browser->loginAs($admin)
                ->visit(route('admin.workorders.index'))
                ->click('tr[data-entry-id="' . $workorder->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='number']", $workorder->number)
                ->assertSeeIn("td[field-key='customer']", $workorder->customer->code)
                ->assertSeeIn("td[field-key='part']", $workorder->part->number)
                ->assertSeeIn("td[field-key='part_number']", $workorder->part_number)
                ->assertSeeIn("td[field-key='process']", $workorder->process->code)
                ->assertSeeIn("td[field-key='price']", $workorder->price)
                ->assertSeeIn("td[field-key='price_code']", $workorder->price_code)
                ->assertSeeIn("td[field-key='date_received']", $workorder->date_received)
                ->assertSeeIn("td[field-key='date_required']", $workorder->date_required)
                ->assertSeeIn("td[field-key='customer_purchase_order']", $workorder->customer_purchase_order)
                ->assertSeeIn("td[field-key='customer_packing_list']", $workorder->customer_packing_list)
                ->assertSeeIn("td[field-key='quantity']", $workorder->quantity)
                ->assertSeeIn("td[field-key='unit_code']", $workorder->unit_code)
                ->assertSeeIn("td[field-key='quantity_shipped']", $workorder->quantity_shipped)
                ->assertSeeIn("td[field-key='our_last_packing_list']", $workorder->our_last_packing_list)
                ->assertSeeIn("td[field-key='destination_code']", $workorder->destination_code)
                ->assertSeeIn("td[field-key='carrier_code']", $workorder->carrier_code)
                ->assertSeeIn("td[field-key='freight_code']", $workorder->freight_code)
                ->assertSeeIn("td[field-key='date_shipped']", $workorder->date_shipped)
                ->assertSeeIn("td[field-key='invoice_number']", $workorder->invoice_number)
                ->assertSeeIn("td[field-key='invoice_date']", $workorder->invoice_date)
                ->assertSeeIn("td[field-key='invoice_amount']", $workorder->invoice_amount)
                ->assertSeeIn("td[field-key='priority']", $workorder->priority)
                ->assertNotChecked("rework")
                ->assertNotChecked("hot")
                ->assertNotChecked("started")
                ->assertNotChecked("completed")
                ->assertNotChecked("shipped")
                ->assertNotChecked("cod")
                ->assertNotChecked("invoiced")
                ->assertSeeIn("td[field-key='note']", $workorder->note)
                ->assertSeeIn("td[field-key='session_id']", $workorder->session_id)
                ->assertSeeIn("td[field-key='revision']", $workorder->revision)
                ->logout();
        });
    }

}
