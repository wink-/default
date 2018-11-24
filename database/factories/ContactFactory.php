<?php

$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        "customer_id" => factory(\App\Customer::class)->create(),
        "first_name" => $faker->name,
        "last_name" => $faker->name,
        "phone" => $faker->name,
        "extension" => $faker->name,
        "email" => $faker->name,
        "archive" => 0,
    ];
});
