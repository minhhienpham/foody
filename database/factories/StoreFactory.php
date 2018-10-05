<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Store::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'describe' => $faker->text($maxNbChars = 500),
        'image' => $faker->image,
        'is_active' => $faker->numberBetween($min = 0, $max = 1),
    ];
});
