<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'address' => $faker->address,
        'money_ship' => $faker->numberBetween($min = 10000, $max = 100000),
        'processing_status' => $faker->numberBetween($min = 1, $max = 3),
        'submit_time' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
        'delivery_time' => $faker->date($format = 'Y-m-d H:i:s', $min = 'now'),
        'customer_note' => $faker->text($maxNbChars = 100),
        'payment_status' => $faker->numberBetween($min = 0, $max = 1),
    ];
});
