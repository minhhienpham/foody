<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'describe' => $faker->text($maxNbChars = 500),
        'price' => $faker->numberBetween($min = 10000, $max = 100000),
        'store_id' => App\Models\Store::all()->random()->id,
        'category_id' => App\Models\Category::all()->random()->id,
    ];
});
