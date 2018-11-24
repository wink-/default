<?php

$factory->define(App\Workorder::class, function (Faker\Generator $faker) {
    return [
        "number" => $faker->randomNumber(2),
        "customer_id" => factory(\App\Customer::class)->create(),
        "part_id" => factory(\App\Part::class)->create(),
        "part_number" => $faker->name,
        "process_id" => factory(\App\Process::class)->create(),
        "price" => $faker->randomNumber(2),
        "price_code" => $faker->name,
        "date_received" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "date_required" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "customer_purchase_order" => $faker->name,
        "customer_packing_list" => $faker->name,
        "quantity" => $faker->randomFloat(2, 1, 100),
        "unit_code" => $faker->name,
        "quantity_shipped" => $faker->randomNumber(2),
        "our_last_packing_list" => $faker->randomNumber(2),
        "destination_code" => $faker->name,
        "carrier_code" => $faker->name,
        "freight_code" => $faker->name,
        "date_shipped" => $faker->date("Y-m-d", $max = 'now'),
        "invoice_number" => $faker->randomNumber(2),
        "invoice_date" => $faker->date("Y-m-d", $max = 'now'),
        "invoice_amount" => $faker->randomNumber(2),
        "priority" => $faker->randomNumber(2),
        "rework" => 0,
        "hot" => 0,
        "started" => 0,
        "completed" => 0,
        "shipped" => 0,
        "cod" => 0,
        "invoiced" => 0,
        "note" => $faker->name,
        "session_id" => $faker->name,
        "archive" => 0,
        "revision" => $faker->randomNumber(2),
    ];
});
