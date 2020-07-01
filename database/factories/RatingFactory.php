<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Rating::class, function (Faker $faker) {
    static $count = 0;

    return [
        'rated_index' => $faker->numberBetween(1, 5),
        'user_id' => 2,
        'product_id' => ++$count,
    ];
});
