<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ShopOpeningStatus::class, function (Faker $faker) {
    return [
        'time_open' =>  '7:00:00',
        'time_close' =>  '21:00:00',
    ];
});
