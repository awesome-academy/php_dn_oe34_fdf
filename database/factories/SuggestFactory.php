<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Suggest::class, function (Faker $faker) {
    return [
        'suggest' => $faker->text,
        'status' => $faker->boolean,
        'user_id' => 2,
    ];
});
