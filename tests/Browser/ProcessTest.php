<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProcessTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateProcess()
    {
        $admin = \App\User::find(1);
        $process = factory(\App\Process::class)->make();

        $this->browse(function (Browser $browser) use ($admin, $process) {
            $browser->loginAs($admin)
                ->visit(route('admin.processes.index'))
                ->clickLink('Add new')
                ->type('code', $process->code)
                ->type('name', $process->name)
                ->type('minimum_lot_charge', $process->minimum_lot_charge)
                ->uncheck('compliant_rohs')
                ->uncheck('compliant_reach')
                ->press('Save')
                ->assertRouteIs('admin.processes.index')
                ->assertSeeIn("tr:last-child td[field-key='code']", $process->code)
                ->assertSeeIn("tr:last-child td[field-key='name']", $process->name);
        });
    }

    public function testEditProcess()
    {
        $admin = \App\User::find(1);
        $process = factory(\App\Process::class)->create();
        $process2 = factory(\App\Process::class)->make();

        $this->browse(function (Browser $browser) use ($admin, $process, $process2) {
            $browser->loginAs($admin)
                ->visit(route('admin.processes.index'))
                ->click('tr[data-entry-id="'.$process->id.'"] .btn-info')
                ->type('code', $process2->code)
                ->type('name', $process2->name)
                ->type('minimum_lot_charge', $process2->minimum_lot_charge)
                ->uncheck('compliant_rohs')
                ->uncheck('compliant_reach')
                ->check('archive')
                ->press('Update')
                ->assertRouteIs('admin.processes.index')
                ->assertSeeIn("tr:last-child td[field-key='code']", $process2->code)
                ->assertSeeIn("tr:last-child td[field-key='name']", $process2->name);
        });
    }

    public function testShowProcess()
    {
        $admin = \App\User::find(1);
        $process = factory(\App\Process::class)->create();

        $this->browse(function (Browser $browser) use ($admin, $process) {
            $browser->loginAs($admin)
                ->visit(route('admin.processes.index'))
                ->click('tr[data-entry-id="'.$process->id.'"] .btn-primary')
                ->assertSeeIn("td[field-key='code']", $process->code)
                ->assertSeeIn("td[field-key='name']", $process->name)
                ->assertSeeIn("td[field-key='minimum_lot_charge']", $process->minimum_lot_charge)
                ->assertChecked('compliant_rohs')
                ->assertChecked('compliant_reach')
                ->assertNotChecked('archive');
        });
    }
}
