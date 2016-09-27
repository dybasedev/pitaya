<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(PitayaApplication\ECommerce\Foundation\UserSystem\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'access_credential' => $faker->userName,
        'email'             => $faker->safeEmail,
        'password'          => $password ?: $password = bcrypt('secret'),
        'remember_token'    => str_random(10),
        'user_type'         => $faker->randomElement([1, 2, 3]),
    ];
});

$factory->define(PitayaApplication\ECommerce\Foundation\UserSystem\Manager::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'access_credential' => $faker->userName,
        'email'             => $faker->safeEmail,
        'password'          => $password ?: $password = bcrypt('secret'),
    ];
});
