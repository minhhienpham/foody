<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Image::class, function (Faker $faker) {
    return [
        'path' => 'img.jpg',
        'product_id' => App\Models\Product::all()->random()->id,
    ];
});
