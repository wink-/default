<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class PartTest extends DuskTestCase
{

    public function testCreatePart()
    {
        $admin = \App\User::find(1);
        $part = factory('App\Part')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $part) {
            $browser->loginAs($admin)
                ->visit(route('admin.parts.index'))
                ->clickLink('Add new')
                ->type("number", $part->number)
                ->type("description", $part->description)
                ->select("customer_id", $part->customer_id)
                ->select("process_id", $part->process_id)
                ->type("method_code", $part->method_code)
                ->type("price", $part->price)
                ->type("price_code", $part->price_code)
                ->check("certify")
                ->type("specification", $part->specification)
                ->check("bake")
                ->type("procedure_code", $part->procedure_code)
                ->type("material", $part->material)
                ->type("material_name", $part->material_name)
                ->type("material_condition", $part->material_condition)
                ->type("thickness_minimum", $part->thickness_minimum)
                ->type("thickness_maximum", $part->thickness_maximum)
                ->type("thickness_unit_code", $part->thickness_unit_code)
                ->type("surface_area", $part->surface_area)
                ->type("surface_area_unit_code", $part->surface_area_unit_code)
                ->type("weight", $part->weight)
                ->type("weight_unit_code", $part->weight_unit_code)
                ->type("length", $part->length)
                ->type("width", $part->width)
                ->type("height", $part->height)
                ->type("dimension_unit_code", $part->dimension_unit_code)
                ->type("material_thickness", $part->material_thickness)
                ->type("material_thickness_unit_code", $part->material_thickness_unit_code)
                ->type("special_requirement", $part->special_requirement)
                ->type("note", $part->note)
                ->type("quality_check_1", $part->quality_check_1)
                ->type("quality_check_2", $part->quality_check_2)
                ->type("quality_check_3", $part->quality_check_3)
                ->type("quality_check_4", $part->quality_check_4)
                ->type("quality_check_5", $part->quality_check_5)
                ->type("quality_check_6", $part->quality_check_6)
                ->check("archive")
                ->type("revision", $part->revision)
                ->press('Save')
                ->assertRouteIs('admin.parts.index')
                ->assertSeeIn("tr:last-child td[field-key='number']", $part->number)
                ->assertSeeIn("tr:last-child td[field-key='description']", $part->description)
                ->assertSeeIn("tr:last-child td[field-key='customer']", $part->customer->code)
                ->assertSeeIn("tr:last-child td[field-key='process']", $part->process->code)
                ->assertSeeIn("tr:last-child td[field-key='method_code']", $part->method_code)
                ->assertSeeIn("tr:last-child td[field-key='price']", $part->price)
                ->assertChecked("certify")
                ->assertSeeIn("tr:last-child td[field-key='specification']", $part->specification)
                ->assertChecked("bake")
                ->assertSeeIn("tr:last-child td[field-key='procedure_code']", $part->procedure_code)
                ->assertSeeIn("tr:last-child td[field-key='material']", $part->material)
                ->assertSeeIn("tr:last-child td[field-key='material_name']", $part->material_name)
                ->assertSeeIn("tr:last-child td[field-key='material_condition']", $part->material_condition)
                ->assertSeeIn("tr:last-child td[field-key='thickness_minimum']", $part->thickness_minimum)
                ->assertSeeIn("tr:last-child td[field-key='thickness_maximum']", $part->thickness_maximum)
                ->assertSeeIn("tr:last-child td[field-key='thickness_unit_code']", $part->thickness_unit_code)
                ->assertSeeIn("tr:last-child td[field-key='surface_area']", $part->surface_area)
                ->assertSeeIn("tr:last-child td[field-key='surface_area_unit_code']", $part->surface_area_unit_code)
                ->assertSeeIn("tr:last-child td[field-key='weight']", $part->weight)
                ->assertSeeIn("tr:last-child td[field-key='weight_unit_code']", $part->weight_unit_code)
                ->assertSeeIn("tr:last-child td[field-key='length']", $part->length)
                ->assertSeeIn("tr:last-child td[field-key='width']", $part->width)
                ->assertSeeIn("tr:last-child td[field-key='height']", $part->height)
                ->assertSeeIn("tr:last-child td[field-key='dimension_unit_code']", $part->dimension_unit_code)
                ->assertSeeIn("tr:last-child td[field-key='material_thickness']", $part->material_thickness)
                ->assertSeeIn("tr:last-child td[field-key='material_thickness_unit_code']", $part->material_thickness_unit_code)
                ->logout();
        });
    }

    public function testEditPart()
    {
        $admin = \App\User::find(1);
        $part = factory('App\Part')->create();
        $part2 = factory('App\Part')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $part, $part2) {
            $browser->loginAs($admin)
                ->visit(route('admin.parts.index'))
                ->click('tr[data-entry-id="' . $part->id . '"] .btn-info')
                ->type("number", $part2->number)
                ->type("description", $part2->description)
                ->select("customer_id", $part2->customer_id)
                ->select("process_id", $part2->process_id)
                ->type("method_code", $part2->method_code)
                ->type("price", $part2->price)
                ->type("price_code", $part2->price_code)
                ->check("certify")
                ->type("specification", $part2->specification)
                ->check("bake")
                ->type("procedure_code", $part2->procedure_code)
                ->type("material", $part2->material)
                ->type("material_name", $part2->material_name)
                ->type("material_condition", $part2->material_condition)
                ->type("thickness_minimum", $part2->thickness_minimum)
                ->type("thickness_maximum", $part2->thickness_maximum)
                ->type("thickness_unit_code", $part2->thickness_unit_code)
                ->type("surface_area", $part2->surface_area)
                ->type("surface_area_unit_code", $part2->surface_area_unit_code)
                ->type("weight", $part2->weight)
                ->type("weight_unit_code", $part2->weight_unit_code)
                ->type("length", $part2->length)
                ->type("width", $part2->width)
                ->type("height", $part2->height)
                ->type("dimension_unit_code", $part2->dimension_unit_code)
                ->type("material_thickness", $part2->material_thickness)
                ->type("material_thickness_unit_code", $part2->material_thickness_unit_code)
                ->type("special_requirement", $part2->special_requirement)
                ->type("note", $part2->note)
                ->type("quality_check_1", $part2->quality_check_1)
                ->type("quality_check_2", $part2->quality_check_2)
                ->type("quality_check_3", $part2->quality_check_3)
                ->type("quality_check_4", $part2->quality_check_4)
                ->type("quality_check_5", $part2->quality_check_5)
                ->type("quality_check_6", $part2->quality_check_6)
                ->check("archive")
                ->type("revision", $part2->revision)
                ->press('Update')
                ->assertRouteIs('admin.parts.index')
                ->assertSeeIn("tr:last-child td[field-key='number']", $part2->number)
                ->assertSeeIn("tr:last-child td[field-key='description']", $part2->description)
                ->assertSeeIn("tr:last-child td[field-key='customer']", $part2->customer->code)
                ->assertSeeIn("tr:last-child td[field-key='process']", $part2->process->code)
                ->assertSeeIn("tr:last-child td[field-key='method_code']", $part2->method_code)
                ->assertSeeIn("tr:last-child td[field-key='price']", $part2->price)
                ->assertChecked("certify")
                ->assertSeeIn("tr:last-child td[field-key='specification']", $part2->specification)
                ->assertChecked("bake")
                ->assertSeeIn("tr:last-child td[field-key='procedure_code']", $part2->procedure_code)
                ->assertSeeIn("tr:last-child td[field-key='material']", $part2->material)
                ->assertSeeIn("tr:last-child td[field-key='material_name']", $part2->material_name)
                ->assertSeeIn("tr:last-child td[field-key='material_condition']", $part2->material_condition)
                ->assertSeeIn("tr:last-child td[field-key='thickness_minimum']", $part2->thickness_minimum)
                ->assertSeeIn("tr:last-child td[field-key='thickness_maximum']", $part2->thickness_maximum)
                ->assertSeeIn("tr:last-child td[field-key='thickness_unit_code']", $part2->thickness_unit_code)
                ->assertSeeIn("tr:last-child td[field-key='surface_area']", $part2->surface_area)
                ->assertSeeIn("tr:last-child td[field-key='surface_area_unit_code']", $part2->surface_area_unit_code)
                ->assertSeeIn("tr:last-child td[field-key='weight']", $part2->weight)
                ->assertSeeIn("tr:last-child td[field-key='weight_unit_code']", $part2->weight_unit_code)
                ->assertSeeIn("tr:last-child td[field-key='length']", $part2->length)
                ->assertSeeIn("tr:last-child td[field-key='width']", $part2->width)
                ->assertSeeIn("tr:last-child td[field-key='height']", $part2->height)
                ->assertSeeIn("tr:last-child td[field-key='dimension_unit_code']", $part2->dimension_unit_code)
                ->assertSeeIn("tr:last-child td[field-key='material_thickness']", $part2->material_thickness)
                ->assertSeeIn("tr:last-child td[field-key='material_thickness_unit_code']", $part2->material_thickness_unit_code)
                ->logout();
        });
    }

    public function testShowPart()
    {
        $admin = \App\User::find(1);
        $part = factory('App\Part')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $part) {
            $browser->loginAs($admin)
                ->visit(route('admin.parts.index'))
                ->click('tr[data-entry-id="' . $part->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='number']", $part->number)
                ->assertSeeIn("td[field-key='description']", $part->description)
                ->assertSeeIn("td[field-key='customer']", $part->customer->code)
                ->assertSeeIn("td[field-key='process']", $part->process->code)
                ->assertSeeIn("td[field-key='method_code']", $part->method_code)
                ->assertSeeIn("td[field-key='price']", $part->price)
                ->assertSeeIn("td[field-key='price_code']", $part->price_code)
                ->assertNotChecked("certify")
                ->assertSeeIn("td[field-key='specification']", $part->specification)
                ->assertNotChecked("bake")
                ->assertSeeIn("td[field-key='procedure_code']", $part->procedure_code)
                ->assertSeeIn("td[field-key='material']", $part->material)
                ->assertSeeIn("td[field-key='material_name']", $part->material_name)
                ->assertSeeIn("td[field-key='material_condition']", $part->material_condition)
                ->assertSeeIn("td[field-key='thickness_minimum']", $part->thickness_minimum)
                ->assertSeeIn("td[field-key='thickness_maximum']", $part->thickness_maximum)
                ->assertSeeIn("td[field-key='thickness_unit_code']", $part->thickness_unit_code)
                ->assertSeeIn("td[field-key='surface_area']", $part->surface_area)
                ->assertSeeIn("td[field-key='surface_area_unit_code']", $part->surface_area_unit_code)
                ->assertSeeIn("td[field-key='weight']", $part->weight)
                ->assertSeeIn("td[field-key='weight_unit_code']", $part->weight_unit_code)
                ->assertSeeIn("td[field-key='length']", $part->length)
                ->assertSeeIn("td[field-key='width']", $part->width)
                ->assertSeeIn("td[field-key='height']", $part->height)
                ->assertSeeIn("td[field-key='dimension_unit_code']", $part->dimension_unit_code)
                ->assertSeeIn("td[field-key='material_thickness']", $part->material_thickness)
                ->assertSeeIn("td[field-key='material_thickness_unit_code']", $part->material_thickness_unit_code)
                ->assertSeeIn("td[field-key='special_requirement']", $part->special_requirement)
                ->assertSeeIn("td[field-key='note']", $part->note)
                ->assertSeeIn("td[field-key='quality_check_1']", $part->quality_check_1)
                ->assertSeeIn("td[field-key='quality_check_2']", $part->quality_check_2)
                ->assertSeeIn("td[field-key='quality_check_3']", $part->quality_check_3)
                ->assertSeeIn("td[field-key='quality_check_4']", $part->quality_check_4)
                ->assertSeeIn("td[field-key='quality_check_5']", $part->quality_check_5)
                ->assertSeeIn("td[field-key='quality_check_6']", $part->quality_check_6)
                ->assertNotChecked("archive")
                ->assertSeeIn("td[field-key='revision']", $part->revision)
                ->logout();
        });
    }
}
