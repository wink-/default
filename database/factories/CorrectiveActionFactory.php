<?php

$factory->define(App\CorrectiveAction::class, function (Faker\Generator $faker) {
    return [
        "discrepant_material_id" => factory(\App\DiscrepantMaterial::class)->create(),
        "description_of_non_conformance" => $faker->name,
        "containment" => $faker->name,
        "interim_action" => $faker->name,
        "preventative_action" => $faker->name,
        "root_cause" => $faker->name,
        "verification" => $faker->name,
        "complete" => 0,
        "completed_at" => $faker->date("Y-m-d", $max = 'now'),
    ];
});
