<?php

use Illuminate\Database\Seeder;

class CustomerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'code' => 'INCOD', 'name' => 'INCODEMA', 'physical_address' => '407 Cliff Street', 'address_extension' => null, 'city' => 'Ithaca', 'state' => 'NY', 'zip' => '14850', 'company_phone' => '6072277070', 'fax' => '6072775511', 'email' => 'sales@incodema.com', 'contact1' => null, 'extension1' => null, 'contact2' => null, 'phone2' => null, 'extension2' => null, 'note' => 'Jeremy QC 235,  Mike Wargo  232 (cell 592-9001), Shipping 221,  Randy 226, Illa / Accounting 231, Sean 229, Wiiki  228,  Butch cell - 227-2612, . Email invoices to incinvoices@incodema.com
mfahs@incodema.com
Fahs x224', 'billing_address' => null, 'billing_city' => null, 'billing_state' => null, 'billing_zip' => null, 'billing_phone' => null, 'billing_fax' => null, 'billing_email' => null, 'ship_to_address' => null, 'ship_to_city' => null, 'ship_to_state' => null, 'ship_to_zip' => null, 'ship_to_phone' => null, 'ship_to_fax' => null, 'ship_to_email' => null, 'tax_id' => null, 'cod' => 0, 'archive' => 0, 'revision' => null, 'ship_to_address_code' => null, 'destination_code' => null, 'carrier_code' => null],

        ];

        foreach ($items as $item) {
            \App\Customer::create($item);
        }
    }
}
