<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'username' => $faker->username,
        'full_name' => $faker->name,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender' => $faker->numberBetween($min = 0, $max = 1),
        'phone' => '01652638375',
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('12345'),
        'role_id' => $faker->numberBetween($min = 1, $max = 3),
        'is_active' => $faker->numberBetween($min = 0, $max = 1),
        'remember_token' => str_random(10),
    ];
});
