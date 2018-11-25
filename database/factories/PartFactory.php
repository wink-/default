<?php

$factory->define(App\Part::class, function (Faker\Generator $faker) {
    return [
        'number'                       => $faker->name,
        'description'                  => $faker->name,
        'customer_id'                  => factory(\App\Customer::class)->create(),
        'process_id'                   => factory(\App\Process::class)->create(),
        'method_code'                  => $faker->name,
        'price'                        => $faker->randomNumber(2),
        'price_code'                   => $faker->name,
        'certify'                      => 0,
        'specification'                => $faker->name,
        'bake'                         => 0,
        'procedure_code'               => $faker->name,
        'material'                     => $faker->name,
        'material_name'                => $faker->name,
        'material_condition'           => $faker->name,
        'thickness_minimum'            => $faker->name,
        'thickness_maximum'            => $faker->name,
        'thickness_unit_code'          => $faker->name,
        'surface_area'                 => $faker->name,
        'surface_area_unit_code'       => $faker->name,
        'weight'                       => $faker->name,
        'weight_unit_code'             => $faker->name,
        'length'                       => $faker->name,
        'width'                        => $faker->name,
        'height'                       => $faker->name,
        'dimension_unit_code'          => $faker->name,
        'material_thickness'           => $faker->name,
        'material_thickness_unit_code' => $faker->name,
        'special_requirement'          => $faker->name,
        'note'                         => $faker->name,
        'quality_check_1'              => $faker->randomNumber(2),
        'quality_check_2'              => $faker->randomNumber(2),
        'quality_check_3'              => $faker->randomNumber(2),
        'quality_check_4'              => $faker->randomNumber(2),
        'quality_check_5'              => $faker->randomNumber(2),
        'quality_check_6'              => $faker->randomNumber(2),
        'archive'                      => 0,
        'revision'                     => $faker->randomNumber(2),
    ];
});
