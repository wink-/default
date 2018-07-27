<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class DiscrepantMaterialTest extends DuskTestCase
{

    public function testCreateDiscrepantMaterial()
    {
        $admin = \App\User::find(1);
        $discrepant_material = factory('App\DiscrepantMaterial')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $discrepant_material) {
            $browser->loginAs($admin)
                ->visit(route('admin.discrepant_materials.index'))
                ->clickLink('Add new')
                ->select("workorder_id", $discrepant_material->workorder_id)
                ->select("part_id", $discrepant_material->part_id)
                ->type("part_number", $discrepant_material->part_number)
                ->select("customer_id", $discrepant_material->customer_id)
                ->type("customer_code", $discrepant_material->customer_code)
                ->select("process_id", $discrepant_material->process_id)
                ->type("process_code", $discrepant_material->process_code)
                ->type("quantity_rejected", $discrepant_material->quantity_rejected)
                ->type("reason_for_rejection", $discrepant_material->reason_for_rejection)
                ->type("rejection_date", $discrepant_material->rejection_date)
                ->select("rejection_type", $discrepant_material->rejection_type)
                ->type("corrective_action_due_date", $discrepant_material->corrective_action_due_date)
                ->attach("form", base_path("tests/_resources/test.jpg"))
                ->press('Save')
                ->assertRouteIs('admin.discrepant_materials.index')
                ->assertSeeIn("tr:last-child td[field-key='workorder']", $discrepant_material->workorder->number)
                ->assertSeeIn("tr:last-child td[field-key='part']", $discrepant_material->part->number)
                ->assertSeeIn("tr:last-child td[field-key='part_number']", $discrepant_material->part_number)
                ->assertSeeIn("tr:last-child td[field-key='customer']", $discrepant_material->customer->code)
                ->assertSeeIn("tr:last-child td[field-key='customer_code']", $discrepant_material->customer_code)
                ->assertSeeIn("tr:last-child td[field-key='process']", $discrepant_material->process->code)
                ->assertSeeIn("tr:last-child td[field-key='process_code']", $discrepant_material->process_code)
                ->assertSeeIn("tr:last-child td[field-key='quantity_rejected']", $discrepant_material->quantity_rejected)
                ->assertSeeIn("tr:last-child td[field-key='rejection_date']", $discrepant_material->rejection_date)
                ->assertSeeIn("tr:last-child td[field-key='rejection_type']", $discrepant_material->rejection_type)
                ->assertSeeIn("tr:last-child td[field-key='corrective_action_due_date']", $discrepant_material->corrective_action_due_date)
                ->logout();
        });
    }

    public function testEditDiscrepantMaterial()
    {
        $admin = \App\User::find(1);
        $discrepant_material = factory('App\DiscrepantMaterial')->create();
        $discrepant_material2 = factory('App\DiscrepantMaterial')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $discrepant_material, $discrepant_material2) {
            $browser->loginAs($admin)
                ->visit(route('admin.discrepant_materials.index'))
                ->click('tr[data-entry-id="' . $discrepant_material->id . '"] .btn-info')
                ->select("workorder_id", $discrepant_material2->workorder_id)
                ->select("part_id", $discrepant_material2->part_id)
                ->type("part_number", $discrepant_material2->part_number)
                ->select("customer_id", $discrepant_material2->customer_id)
                ->type("customer_code", $discrepant_material2->customer_code)
                ->select("process_id", $discrepant_material2->process_id)
                ->type("process_code", $discrepant_material2->process_code)
                ->type("quantity_rejected", $discrepant_material2->quantity_rejected)
                ->type("reason_for_rejection", $discrepant_material2->reason_for_rejection)
                ->type("rejection_date", $discrepant_material2->rejection_date)
                ->select("rejection_type", $discrepant_material2->rejection_type)
                ->type("corrective_action_due_date", $discrepant_material2->corrective_action_due_date)
                ->attach("form", base_path("tests/_resources/test.jpg"))
                ->press('Update')
                ->assertRouteIs('admin.discrepant_materials.index')
                ->assertSeeIn("tr:last-child td[field-key='workorder']", $discrepant_material2->workorder->number)
                ->assertSeeIn("tr:last-child td[field-key='part']", $discrepant_material2->part->number)
                ->assertSeeIn("tr:last-child td[field-key='part_number']", $discrepant_material2->part_number)
                ->assertSeeIn("tr:last-child td[field-key='customer']", $discrepant_material2->customer->code)
                ->assertSeeIn("tr:last-child td[field-key='customer_code']", $discrepant_material2->customer_code)
                ->assertSeeIn("tr:last-child td[field-key='process']", $discrepant_material2->process->code)
                ->assertSeeIn("tr:last-child td[field-key='process_code']", $discrepant_material2->process_code)
                ->assertSeeIn("tr:last-child td[field-key='quantity_rejected']", $discrepant_material2->quantity_rejected)
                ->assertSeeIn("tr:last-child td[field-key='rejection_date']", $discrepant_material2->rejection_date)
                ->assertSeeIn("tr:last-child td[field-key='rejection_type']", $discrepant_material2->rejection_type)
                ->assertSeeIn("tr:last-child td[field-key='corrective_action_due_date']", $discrepant_material2->corrective_action_due_date)
                ->logout();
        });
    }

    public function testShowDiscrepantMaterial()
    {
        $admin = \App\User::find(1);
        $discrepant_material = factory('App\DiscrepantMaterial')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $discrepant_material) {
            $browser->loginAs($admin)
                ->visit(route('admin.discrepant_materials.index'))
                ->click('tr[data-entry-id="' . $discrepant_material->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='workorder']", $discrepant_material->workorder->number)
                ->assertSeeIn("td[field-key='part']", $discrepant_material->part->number)
                ->assertSeeIn("td[field-key='part_number']", $discrepant_material->part_number)
                ->assertSeeIn("td[field-key='customer']", $discrepant_material->customer->code)
                ->assertSeeIn("td[field-key='customer_code']", $discrepant_material->customer_code)
                ->assertSeeIn("td[field-key='process']", $discrepant_material->process->code)
                ->assertSeeIn("td[field-key='process_code']", $discrepant_material->process_code)
                ->assertSeeIn("td[field-key='quantity_rejected']", $discrepant_material->quantity_rejected)
                ->assertSeeIn("td[field-key='reason_for_rejection']", $discrepant_material->reason_for_rejection)
                ->assertSeeIn("td[field-key='rejection_date']", $discrepant_material->rejection_date)
                ->assertSeeIn("td[field-key='rejection_type']", $discrepant_material->rejection_type)
                ->assertSeeIn("td[field-key='corrective_action_due_date']", $discrepant_material->corrective_action_due_date)
                ->logout();
        });
    }

}
