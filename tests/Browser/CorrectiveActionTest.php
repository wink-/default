<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CorrectiveActionTest extends DuskTestCase
{

    public function testCreateCorrectiveAction()
    {
        $admin = \App\User::find(1);
        $corrective_action = factory(\App\CorrectiveAction::class)->make();

        

        $this->browse(function (Browser $browser) use ($admin, $corrective_action) {
            $browser->loginAs($admin)
                ->visit(route('admin.corrective_actions.index'))
                ->clickLink('Add new')
                ->select("discrepant_material_id", $corrective_action->discrepant_material_id)
                ->type("description_of_non_conformance", $corrective_action->description_of_non_conformance)
                ->type("containment", $corrective_action->containment)
                ->type("interim_action", $corrective_action->interim_action)
                ->type("preventative_action", $corrective_action->preventative_action)
                ->type("root_cause", $corrective_action->root_cause)
                ->type("verification", $corrective_action->verification)
                ->check("complete")
                ->type("completed_at", $corrective_action->completed_at)
                ->attach("supporting_document", base_path("tests/_resources/test.jpg"))
                ->press('Save')
                ->assertRouteIs('admin.corrective_actions.index')
                ->assertSeeIn("tr:last-child td[field-key='discrepant_material']", $corrective_action->discrepant_material->part_number)
                ->assertChecked("complete")
                ->assertSeeIn("tr:last-child td[field-key='completed_at']", $corrective_action->completed_at)
                ->logout();
        });
    }

    public function testEditCorrectiveAction()
    {
        $admin = \App\User::find(1);
        $corrective_action = factory(\App\CorrectiveAction::class)->create();
        $corrective_action2 = factory(\App\CorrectiveAction::class)->make();

        

        $this->browse(function (Browser $browser) use ($admin, $corrective_action, $corrective_action2) {
            $browser->loginAs($admin)
                ->visit(route('admin.corrective_actions.index'))
                ->click('tr[data-entry-id="' . $corrective_action->id . '"] .btn-info')
                ->select("discrepant_material_id", $corrective_action2->discrepant_material_id)
                ->type("description_of_non_conformance", $corrective_action2->description_of_non_conformance)
                ->type("containment", $corrective_action2->containment)
                ->type("interim_action", $corrective_action2->interim_action)
                ->type("preventative_action", $corrective_action2->preventative_action)
                ->type("root_cause", $corrective_action2->root_cause)
                ->type("verification", $corrective_action2->verification)
                ->check("complete")
                ->type("completed_at", $corrective_action2->completed_at)
                ->attach("supporting_document", base_path("tests/_resources/test.jpg"))
                ->press('Update')
                ->assertRouteIs('admin.corrective_actions.index')
                ->assertSeeIn("tr:last-child td[field-key='discrepant_material']", $corrective_action2->discrepant_material->part_number)
                ->assertChecked("complete")
                ->assertSeeIn("tr:last-child td[field-key='completed_at']", $corrective_action2->completed_at)
                ->logout();
        });
    }

    public function testShowCorrectiveAction()
    {
        $admin = \App\User::find(1);
        $corrective_action = factory(\App\CorrectiveAction::class)->create();

        


        $this->browse(function (Browser $browser) use ($admin, $corrective_action) {
            $browser->loginAs($admin)
                ->visit(route('admin.corrective_actions.index'))
                ->click('tr[data-entry-id="' . $corrective_action->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='discrepant_material']", $corrective_action->discrepant_material->part_number)
                ->assertSeeIn("td[field-key='description_of_non_conformance']", $corrective_action->description_of_non_conformance)
                ->assertSeeIn("td[field-key='containment']", $corrective_action->containment)
                ->assertSeeIn("td[field-key='interim_action']", $corrective_action->interim_action)
                ->assertSeeIn("td[field-key='preventative_action']", $corrective_action->preventative_action)
                ->assertSeeIn("td[field-key='root_cause']", $corrective_action->root_cause)
                ->assertSeeIn("td[field-key='verification']", $corrective_action->verification)
                ->assertNotChecked("complete")
                ->assertSeeIn("td[field-key='completed_at']", $corrective_action->completed_at)
                ->logout();
        });
    }
}
