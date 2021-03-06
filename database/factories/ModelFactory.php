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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Training::class, function (Faker\Generator $faker) {
    return [
        'creator_id' => $faker->randomElement(range(1, 100)),
        'trainer_id' => $faker->randomElement(range(1, 100)),
        'venue_id' => $faker->randomElement(range(1, 10)),
        'date_start' => $faker->date,
        'date_end' => $faker->date,
        'time_start' => $faker->time,
        'time_end' => $faker->time,
    ];
});

$factory->define(App\Venue::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'latitude' => 30.00,
        'longitude' => 100.00,
    ];
});

$factory->define(App\Profile::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->randomElement(range(1, 100)),
        'phone' => $faker->regexify('[0-9]{12}'),
        'ic' => $faker->regexify('[0-9]{6}[0-9]{2}[0-9]{4}'),
    ];
});
