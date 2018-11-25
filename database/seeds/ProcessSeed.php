<?php

use Illuminate\Database\Seeder;

class ProcessSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'code' => 'BlAn', 'name' => 'Black Anodize', 'minimum_lot_charge' => '65.00', 'compliant_rohs' => 1, 'compliant_reach' => 1, 'archive' => 0, 'revision' => null],

        ];

        foreach ($items as $item) {
            \App\Process::create($item);
        }
    }
}
