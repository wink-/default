<?php

$factory->define(App\Process::class, function (Faker\Generator $faker) {
    return [
        'code'               => $faker->name,
        'name'               => $faker->name,
        'minimum_lot_charge' => $faker->randomNumber(2),
        'compliant_rohs'     => 1,
        'compliant_reach'    => 1,
        'archive'            => 0,
        'revision'           => $faker->randomNumber(2),
    ];
});
