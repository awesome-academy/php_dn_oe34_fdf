<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->text,
        'user_id' => 2,
        'product_id' => $faker->numberBetween(1, 10),
    ];
});
