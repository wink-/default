<?php

$factory->define(App\Quote::class, function (Faker\Generator $faker) {
    return [
        'customer_id'          => factory(\App\Customer::class)->create(),
        'contact_id'           => factory(\App\Contact::class)->create(),
        'partnumber'           => $faker->name,
        'partdescription'      => $faker->name,
        'process_id'           => factory(\App\Process::class)->create(),
        'specification'        => $faker->name,
        'material'             => $faker->name,
        'method'               => collect(['Barrel Plate', 'Bulk Process', 'Hand Operation', 'Lab Operation', 'Rack Plate'])->random(),
        'quantity_minimum'     => $faker->randomNumber(2),
        'quantity_maximum'     => $faker->randomNumber(2),
        'price'                => $faker->randomNumber(2),
        'units'                => collect(['each', 'M', 'pound', 'ft', 'lot', 'in', 'sets'])->random(),
        'miminum_lot_charge'   => $faker->randomNumber(2),
        'quantity_price_break' => $faker->randomNumber(2),
        'price_break'          => $faker->randomNumber(2),
        'thickness_minimum'    => $faker->name,
        'thickness_maximum'    => $faker->name,
        'weight'               => $faker->name,
        'surface_area'         => $faker->name,
        'baking_time_pre'      => $faker->name,
        'baking_temp_pre'      => $faker->name,
        'baking_time_post'     => $faker->name,
        'baking_temp_post'     => $faker->name,
        'bake_notes'           => $faker->name,
        'blasting'             => 0,
        'blast_notes'          => $faker->name,
        'masking'              => 0,
        'mask_notes'           => $faker->name,
        'testing'              => 0,
        'testing_note'         => $faker->name,
        'notes'                => $faker->name,
        'comments'             => $faker->name,
        'user_id'              => factory(\App\User::class)->create(),
        'archive'              => 0,
        'revision'             => $faker->randomNumber(2),
    ];
});
