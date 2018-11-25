<?php

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'code'                 => $faker->name,
        'name'                 => $faker->name,
        'physical_address'     => $faker->name,
        'address_extension'    => $faker->name,
        'city'                 => $faker->name,
        'state'                => $faker->name,
        'zip'                  => $faker->name,
        'company_phone'        => $faker->name,
        'fax'                  => $faker->name,
        'email'                => $faker->name,
        'contact1'             => $faker->name,
        'extension1'           => $faker->name,
        'contact2'             => $faker->name,
        'phone2'               => $faker->name,
        'extension2'           => $faker->name,
        'note'                 => $faker->name,
        'billing_address'      => $faker->name,
        'billing_city'         => $faker->name,
        'billing_state'        => $faker->name,
        'billing_zip'          => $faker->name,
        'billing_phone'        => $faker->name,
        'billing_fax'          => $faker->name,
        'billing_email'        => $faker->name,
        'ship_to_address'      => $faker->name,
        'ship_to_city'         => $faker->name,
        'ship_to_state'        => $faker->name,
        'ship_to_zip'          => $faker->name,
        'ship_to_phone'        => $faker->name,
        'ship_to_fax'          => $faker->name,
        'ship_to_email'        => $faker->name,
        'tax_id'               => $faker->name,
        'cod'                  => 0,
        'archive'              => 0,
        'revision'             => $faker->randomNumber(2),
        'ship_to_address_code' => $faker->name,
        'destination_code'     => $faker->name,
        'carrier_code'         => $faker->name,
    ];
});
