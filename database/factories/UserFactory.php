<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\User;
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

$factory->define(User::class, function (Faker $faker) {
    static $count = 0;

    $name = [
        'Admin',
        'Ong Van Phat',
    ];
    $email = [
        'admin@gmail.com',
        'ongvanphat124@gmail.com',
    ];
    $username = [
        'admin',
        'ovpdng124',
    ];

    return [
        'full_name' => $name[$count],
        'username' => $username[$count],
        'email' => $email[$count],
        'password' => bcrypt('123123'),
        'phone_number' => $faker->phoneNumber,
        'verify_token' => base64_encode($email[$count]) . '.' . base64_encode(now()),
        'verify_at' => now(),
        'role_id' => ++$count,
    ];
});
