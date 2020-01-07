<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;

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
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Type::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Room::class, function (Faker\Generator $faker) {
    return [
        'number' => '1',
        'floor' => 'ground',
        'type_id' => function () {
            return factory(\App\Type::class)->create()->id;
        },
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'address' => $faker->streetAddress,
        'birthdate' => '04/01/2000', //$faker->dateTimeThisCentury,
    ];
});

$factory->define(App\Booking::class, function (Faker\Generator $faker) {
    return [
        'customer_id' => function () {
            return factory(\App\Customer::class)->create()->id;
        },
        'room_id' => function () {
            return factory(\App\Room::class)->create()->id;
        },
        'checkin' => '03/03/2019',
        'checkout' => '30/03/2019',
    ];
});
