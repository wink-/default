<?php

use Illuminate\Database\Seeder;

class ContactSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'customer_id' => 1, 'first_name' => 'Randy', 'last_name' => 'Smith', 'phone' => '6072777070', 'extension' => '226', 'email' => 'rsmith@incodema.com', 'archive' => 0],

        ];

        foreach ($items as $item) {
            \App\Contact::create($item);
        }
    }
}
