<?php

$factory->define(App\DiscrepantMaterial::class, function (Faker\Generator $faker) {
    return [
        "workorder_id" => factory('App\Workorder')->create(),
        "part_id" => factory('App\Part')->create(),
        "part_number" => $faker->name,
        "customer_id" => factory('App\Customer')->create(),
        "customer_code" => $faker->name,
        "process_id" => factory('App\Process')->create(),
        "process_code" => $faker->name,
        "quantity_rejected" => $faker->randomNumber(2),
        "reason_for_rejection" => $faker->name,
        "rejection_date" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "rejection_type" => collect(["external","internal",])->random(),
        "corrective_action_due_date" => $faker->date("Y-m-d H:i:s", $max = 'now'),
    ];
});
