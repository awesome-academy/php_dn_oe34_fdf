<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Favorite::class, function (Faker $faker) {
    static $productId = 1;

    return [
        'user_id' => 2,
        'product_id' => $productId++,
    ];
});
