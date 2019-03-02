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
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Type::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->numberBetween(0, 10000),
    ];
});

$factory->define(App\Room::class, function (Faker\Generator $faker) {
    return [
        'number' => '1',
        'floor' => 'ground',
        'type_id' => function () {
            return factory(\App\Type::class)->create()->id;
        }
    ];
});
